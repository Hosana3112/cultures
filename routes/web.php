<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TwoFactorAuthController;
use App\Http\Controllers\Auth\TwoFactorLoginController;
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

// Routes publiques pour les médias
Route::get('medias/{media}/download', [MediasController::class, 'download'])->name('medias.download');
Route::get('medias/{media}/stream', [MediasController::class, 'stream'])->name('medias.stream');

// Routes de défi 2FA (accessibles sans auth complète)
Route::middleware(['web'])->group(function () {
    Route::get('/two-factor-challenge', [TwoFactorLoginController::class, 'showChallengeForm'])
        ->name('two-factor.challenge');
    
    Route::post('/two-factor-challenge', [TwoFactorLoginController::class, 'verifyChallenge'])
        ->name('two-factor.login');
    
    Route::post('/two-factor-backup-challenge', [TwoFactorLoginController::class, 'verifyBackupCode'])
        ->name('two-factor.backup-login');
});

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Routes de gestion 2FA
    Route::get('/two-factor/enable', [TwoFactorAuthController::class, 'enable'])
        ->name('two-factor.enable');
    
    Route::post('/two-factor/verify', [TwoFactorAuthController::class, 'verifyEnable'])
        ->name('two-factor.verify');
    
    Route::post('/two-factor/disable', [TwoFactorAuthController::class, 'disable'])
        ->name('two-factor.disable');
    
    Route::get('/two-factor/backup-codes', [TwoFactorAuthController::class, 'regenerateBackupCodes'])
        ->name('two-factor.backup-codes');
    
    // Routes de profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes protégées par 2FA
    Route::middleware(['2fa','admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::get('/dashboard-custom', [DashboardController::class, 'index'])
            ->name('dashboard-custom')->middleware('admin');
        
        // Routes des médias (CRUD complet)
        Route::resource('medias', MediasController::class)->except(['show']);
        Route::get('medias/{media}', [MediasController::class, 'show'])->name('medias.show')->middleware('admin');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/front.php';