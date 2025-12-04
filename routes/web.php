<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\MediasController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('front.accueil');
});


// Routes de paiement
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('/payment/status/{reference}', [PaymentController::class, 'checkStatus'])->name('payment.status');

// Webhook (doit être en POST)
Route::post('/webhook/fedapay', [PaymentController::class, 'webhook'])->name('webhook.fedapay');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 Route::get('/dashboard-custom', [DashboardController::class, 'index'])
        ->name('dashboard-custom');

Route::get('medias/{media}/download', [MediasController::class, 'download'])->name('medias.download');
Route::get('medias/{media}/stream', [MediasController::class, 'stream'])->name('medias.stream');
Route::resource('medias', MediasController::class);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/front.php';