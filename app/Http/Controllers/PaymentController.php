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
    public function showPaymentForm(Request $request)
    {
        // Récupérer l'ID du contenu depuis la requête
        $contenuId = $request->query('contenu_id');
        
        // Stocker l'ID du contenu dans la session
        if ($contenuId) {
            session(['contenu_id' => $contenuId]);
            Log::info('Contenu ID stocké dans la session: ' . $contenuId);
        }
        
        Log::info('Session complète dans showPaymentForm:', session()->all());
        
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
        
        // Récupérer l'ID du contenu depuis la session
        $contenuId = session('contenu_id');
        Log::info('Contenu ID récupéré dans processPayment: ' . $contenuId);
        
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
        session([
            'payment_reference' => $payment->reference,
            'payment_contenu_id' => $contenuId, // Stocker l'ID du contenu depuis la session
            'payment_id' => $payment->id, // Stocker l'ID du paiement
        ]);
        
        Log::info('Données stockées dans la session:', [
            'payment_contenu_id' => $contenuId,
            'payment_reference' => $payment->reference,
            'payment_id' => $payment->id,
        ]);
        
        // Nettoyer l'ancien contenu_id de la session
        session()->forget('contenu_id');
        
        // Rediriger vers FedaPay
        return redirect($result['payment_url']);
    }
    
    /**
     * Callback de succès
     */
    public function success(Request $request)
    {
        $transactionId = $request->query('id');
        
        Log::info('=== DEBUT SUCCESS CALLBACK ===');
        Log::info('Transaction ID: ' . $transactionId);
        Log::info('Session complète dans success:', session()->all());
        
        if (!$transactionId) {
            Log::error('Transaction ID manquant');
            return redirect()->route('payment.form')
                ->with('error', 'Transaction ID manquant');
        }
        
        // Vérifier le paiement
        $result = $this->fedapayService->verifyPayment($transactionId);
        
        Log::info('Résultat vérification FedaPay:', $result);
        
        if ($result['success'] && $result['status'] === 'approved') {
            // Trouver le paiement
            $payment = Payment::where('transaction_id', $transactionId)->first();
            
            if ($payment && $payment->status !== 'paid') {
                $payment->markAsPaid(
                    $transactionId,
                    $result['transaction']->mode ?? 'card'
                );
                
                // Récupérer l'ID du contenu depuis la session
                $contenuId = session('payment_contenu_id');
                
                Log::info('Contenu ID récupéré de la session: ' . $contenuId);
                
                if ($contenuId) {
                    // Nettoyer la session
                    session()->forget('payment_contenu_id');
                    session()->forget('payment_reference');
                    session()->forget('payment_id');
                    
                    Log::info('Redirection vers contenu ID: ' . $contenuId);
                    
                    // Rediriger vers la vue du contenu concerné
                    return redirect()->route('front.show', ['id' => $contenuId])
                        ->with('success', 'Paiement effectué avec succès! Vous avez maintenant accès au contenu.');
                } else {
                    Log::info('Aucun contenu ID trouvé, affichage vue succès normale');
                    
                    // Si aucun contenu n'est associé, afficher la vue de succès normale
                    return view('payment.success', [
                        'payment' => $payment,
                        'transaction' => $result['transaction'],
                    ]);
                }
            }
        }
        
        Log::error('Paiement non confirmé ou échec de vérification');
        
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
        $contenuId = session('payment_contenu_id');
        
        Log::info('=== CALLBACK ANNULATION ===');
        Log::info('Transaction ID: ' . $transactionId);
        Log::info('Contenu ID: ' . $contenuId);
        
        if ($transactionId) {
            $payment = Payment::where('transaction_id', $transactionId)->first();
            if ($payment && $payment->status === 'pending') {
                $payment->update(['status' => 'cancelled']);
            }
        }
        
        // Nettoyer la session
        session()->forget('payment_contenu_id');
        session()->forget('payment_reference');
        session()->forget('payment_id');
        
        // Si on avait un contenu_id, proposer de retourner au contenu
        if ($contenuId) {
            return view('payment.cancel', [
                'contenu_id' => $contenuId,
            ]);
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
                
                // Récupérer l'ID du contenu depuis la session (si disponible)
                $contenuId = session('payment_contenu_id');
                
                // Ici, vous pouvez :
                // - Envoyer un email de confirmation
                // - Débloquer l'accès au contenu
                // - Notifier l'admin, etc.
                
                Log::info('Paiement marqué comme payé:', ['payment' => $payment->reference, 'contenu_id' => $contenuId]);
                
                // Nettoyer la session
                session()->forget('payment_contenu_id');
                session()->forget('payment_reference');
                session()->forget('payment_id');
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