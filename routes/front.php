<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContenusController;
use App\Http\Controllers\CommentairesController;

/*
|--------------------------------------------------------------------------
| Routes Frontend Publiques (Sans authentification)
|--------------------------------------------------------------------------
*/

// PAGE D'ACCUEIL PRINCIPALE
Route::get('/accueil', [HomeController::class, 'index'])
    ->name('front.accueil');

// RECHERCHE
Route::get('/recherche', [HomeController::class, 'search'])
    ->name('front.search');

// CONTENUS PAR RÉGION
Route::get('/region/{regionId}', [HomeController::class, 'parRegion'])
    ->name('front.region.show')
    ->where('regionId', '[0-9]+');

// CONTENUS PAR TYPE
Route::get('/type/{typeId}', [HomeController::class, 'parType'])
    ->name('front.type.show')
    ->where('typeId', '[0-9]+');

// FAQ
Route::get('/faq', [HomeController::class, 'faq'])
    ->name('front.faq');

// AFFICHAGE D'UN CONTENU (Publique - seulement si validé)
// MODIFICATION ICI : Utilisation de HomeController au lieu de ContenusController
Route::get('/contenus/{id}', [HomeController::class, 'show'])
    ->name('front.show')
    ->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Routes Frontend Authentifiées (Nécessitent une connexion)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // CRÉATION DE CONTENU
    Route::get('/creer-contenu', [ContenusController::class, 'createFront'])
        ->name('front.create');
    
    // STOCKAGE (commun)
    Route::post('/contenus', [ContenusController::class, 'store'])
        ->name('contenus.store');
    
    // MODIFICATION DE CONTENU
    Route::get('/contenus/{id}/edit', [ContenusController::class, 'edit'])
        ->name('contenus.edit')
        ->where('id', '[0-9]+');
    
    Route::put('/contenus/{id}', [ContenusController::class, 'update'])
        ->name('contenus.update')
        ->where('id', '[0-9]+');
    
    // SUPPRESSION DE CONTENU
    Route::delete('/contenus/{id}', [ContenusController::class, 'destroy'])
        ->name('contenus.destroy')
        ->where('id', '[0-9]+');
    
    // COMMENTAIRES (AJAX)
    Route::post('/commentaires', [CommentairesController::class, 'store'])
        ->name('commentaires.store');
    
});

/*
|--------------------------------------------------------------------------
| Routes API pour AJAX
|--------------------------------------------------------------------------
*/

// API POUR COMMENTAIRES D'UN CONTENU
Route::get('/api/contenus/{contenuId}/commentaires', [CommentairesController::class, 'getByContenu'])
    ->name('api.commentaires.by-contenu')
    ->where('contenuId', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Routes de Secours et Redirections
|--------------------------------------------------------------------------
*/

// Redirection pour l'ancienne route d'accueil
Route::get('/front/accueil', function () {
    return redirect()->route('front.accueil');
});

// Redirection pour éviter les 404
Route::fallback(function () {
    return redirect()->route('front.accueil');
});