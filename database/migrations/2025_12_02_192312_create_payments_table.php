<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->string('reference')->unique();
        $table->string('transaction_id')->nullable();
        $table->decimal('amount', 10, 2);
        $table->string('currency')->default('XOF');
        $table->string('status')->default('pending');
        $table->string('payment_method')->nullable();
        $table->string('customer_email');
        $table->string('customer_name');
        $table->string('customer_phone')->nullable();
        $table->text('description')->nullable();
        $table->json('metadata')->nullable();
        $table->timestamp('paid_at')->nullable();
        $table->timestamps(); // <-- UNIQUEMENT CETTE LIGNE pour created_at/updated_at
        
        $table->index('reference');
        $table->index('transaction_id');
        $table->index('customer_email');
        $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
