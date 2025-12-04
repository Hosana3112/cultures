<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\FedaPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $fedapayService;
    
    public function __construct(FedaPayService $fedapayService)
    {
        $this->fedapayService = $fedapayService;
    }
    
    /**
     * Afficher le formulaire de paiement
     */
    public function showPaymentForm()
    {
        return view('payment.form');
    }
    
    /**
     * Traiter le paiement
     */
    public function processPayment(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100|max:1000000',
            'customer_name' => 'required|string|min:3|max:100',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string',
            'description' => 'nullable|string|max:255',
        ]);
        
        // Créer l'enregistrement de paiement
        $payment = Payment::create([
            'reference' => Payment::generateReference(),
            'amount' => $validated['amount'],
            'currency' => 'XOF',
            'status' => 'pending',
            'customer_email' => $validated['customer_email'],
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'description' => $validated['description'] ?? 'Paiement',
        ]);
        
        // Préparer les données pour FedaPay
        $names = explode(' ', $validated['customer_name'], 2);
        $firstName = $names[0];
        $lastName = $names[1] ?? '';
        
        $data = [
            'amount' => $validated['amount'],
            'description' => $payment->description,
            'customer' => [
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $validated['customer_email'],
                'phone' => $validated['customer_phone'],
            ],
        ];
        
        // Créer le paiement chez FedaPay
        $result = $this->fedapayService->createPayment($data);
        
        if (!$result['success']) {
            $payment->update(['status' => 'failed']);
            return back()->with('error', 'Erreur: ' . $result['error']);
        }
        
        // Mettre à jour avec l'ID de transaction
        $payment->update([
            'transaction_id' => $result['transaction_id'],
        ]);
        
        // Stocker dans la session pour récupérer après redirection
        session(['payment_reference' => $payment->reference]);
        
        // Rediriger vers FedaPay
        return redirect($result['payment_url']);
    }
    
    /**
     * Callback de succès
     */
    public function success(Request $request)
    {
        $transactionId = $request->query('id');
        
        if (!$transactionId) {
            return redirect()->route('payment.form')
                ->with('error', 'Transaction ID manquant');
        }
        
        // Vérifier le paiement
        $result = $this->fedapayService->verifyPayment($transactionId);
        
        if ($result['success'] && $result['status'] === 'approved') {
            // Trouver le paiement
            $payment = Payment::where('transaction_id', $transactionId)->first();
            
            if ($payment && $payment->status !== 'paid') {
                $payment->markAsPaid(
                    $transactionId,
                    $result['transaction']->mode ?? 'card'
                );
                
                return view('payment.success', [
                    'payment' => $payment,
                    'transaction' => $result['transaction'],
                ]);
            }
        }
        
        // Si échec, rediriger vers le formulaire
        return redirect()->route('payment.form')
            ->with('error', 'Paiement non confirmé');
    }
    
    /**
     * Callback d'annulation
     */
    public function cancel(Request $request)
    {
        $transactionId = $request->query('id');
        
        if ($transactionId) {
            $payment = Payment::where('transaction_id', $transactionId)->first();
            if ($payment && $payment->status === 'pending') {
                $payment->update(['status' => 'cancelled']);
            }
        }
        
        return view('payment.cancel');
    }
    
    /**
     * Webhook FedaPay (pour notifications automatiques)
     */
    public function webhook(Request $request)
    {
        Log::info('Webhook FedaPay reçu:', $request->all());
        
        // Récupérer les données
        $event = $request->input('event');
        $data = $request->input('data');
        
        if ($event === 'transaction.approved' && isset($data['id'])) {
            $transactionId = $data['id'];
            
            // Trouver le paiement
            $payment = Payment::where('transaction_id', $transactionId)->first();
            
            if ($payment && $payment->status !== 'paid') {
                $payment->markAsPaid(
                    $transactionId,
                    $data['mode'] ?? 'card'
                );
                
                // Ici, vous pouvez :
                // - Envoyer un email de confirmation
                // - Mettre à jour votre stock
                // - Notifier l'admin, etc.
                
                Log::info('Paiement marqué comme payé:', ['payment' => $payment->reference]);
            }
        }
        
        return response()->json(['status' => 'ok']);
    }
    
    /**
     * Vérifier le statut d'un paiement
     */
    public function checkStatus($reference)
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();
        
        if ($payment->transaction_id) {
            $result = $this->fedapayService->verifyPayment($payment->transaction_id);
            
            if ($result['success'] && $result['status'] === 'approved') {
                if ($payment->status !== 'paid') {
                    $payment->markAsPaid(
                        $payment->transaction_id,
                        $result['transaction']->mode ?? 'card'
                    );
                }
            }
        }
        
        return view('payment.status', compact('payment'));
    }
}