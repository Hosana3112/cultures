<?php

namespace App\Services;

use FedaPay\FedaPay;
use FedaPay\Transaction;
use Exception;
use Illuminate\Support\Facades\Log;

class FedaPayService
{
    public function __construct()
    {
        // Configuration initiale
        $this->initialize();
    }
    
    /**
     * Initialiser la configuration FedaPay
     */
    private function initialize()
    {
        $mode = config('fedapay.mode');
        $apiKey = config('fedapay.api_key');
        
        FedaPay::setApiKey($apiKey);
        FedaPay::setEnvironment($mode);
    }
    
    /**
     * Créer un paiement
     */
    public function createPayment($data)
    {
        try {
            // Créer directement la transaction avec les infos client
            $transaction = Transaction::create([
                'description' => $data['description'],
                'amount' => (int)$data['amount'],
                'currency' => [
                    'iso' => 'XOF'
                ],
                'customer' => [
                    'firstname' => $data['customer']['firstname'],
                    'lastname' => $data['customer']['lastname'],
                    'email' => $data['customer']['email'],
                    'phone_number' => [
                        'number' => $data['customer']['phone'] ?? '+22997000000',
                        'country' => 'bj' // ou 'tg', 'ci', 'sn'
                    ]
                ],
                'callback_url' => url('/payment/success'),
                'cancel_url' => url('/payment/cancel'),
            ]);

            $token = $transaction->generateToken();

            return [
                'success' => true,
                'payment_url' => $token->url,
                'transaction_id' => $transaction->id,
            ];
        } catch (\Exception $e) {
            Log::error('FedaPay Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Vérifier le statut d'une transaction
     */
    public function verifyPayment($transactionId)
    {
        try {
            $transaction = Transaction::retrieve($transactionId);
            
            return [
                'success' => true,
                'status' => $transaction->status,
                'transaction' => $transaction,
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
}