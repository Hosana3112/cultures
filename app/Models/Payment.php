<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reference',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'customer_email',
        'customer_name',
        'customer_phone',
        'description',
        'metadata',
        'paid_at',
    ];
    
    protected $casts = [
        'amount' => 'decimal:2',
        'metadata' => 'array',
        'paid_at' => 'datetime',
    ];
    
    /**
     * Générer une référence unique
     */
    public static function generateReference()
    {
        return 'PAY-' . strtoupper(Str::random(10)) . '-' . time();
    }
    
    /**
     * Vérifier si le paiement est réussi
     */
    public function isPaid()
    {
        return $this->status === 'paid';
    }
    
    /**
     * Marquer comme payé
     */
    public function markAsPaid($transactionId, $paymentMethod = null)
    {
        $this->update([
            'status' => 'paid',
            'transaction_id' => $transactionId,
            'payment_method' => $paymentMethod,
            'paid_at' => now(),
        ]);
    }
}