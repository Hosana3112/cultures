<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::resource('langues', 'App\Http\Controllers\LanguesController');
    
    // Sans use, utiliser le namespace complet
    Route::put('contenus/{contenu}/valider', ['App\Http\Controllers\ContenusController', 'valider'])->name('contenus.valider');
    Route::resource('contenus', 'App\Http\Controllers\ContenusController');
    
    Route::resource('roles', 'App\Http\Controllers\RolesController');
    Route::resource('utilisateurs', 'App\Http\Controllers\UtilisateursController');
    Route::resource('typecontenus', 'App\Http\Controllers\TypeContenuesController');
    Route::resource('typemedias', 'App\Http\Controllers\TypeMediasController');
    Route::resource('regions', 'App\Http\Controllers\RegionsController');
    Route::resource('commentaires', 'App\Http\Controllers\CommentairesController');
});