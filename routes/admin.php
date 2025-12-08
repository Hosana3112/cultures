<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function(){
    // Routes avec préfixe 'admin.' pour éviter les conflits
    Route::resource('langues', 'App\Http\Controllers\LanguesController')
        ->names('langues');
    
    Route::put('contenus/{contenu}/valider', ['App\Http\Controllers\ContenusController', 'valider'])
        ->name('contenus.valider');
    
    Route::resource('contenus', 'App\Http\Controllers\ContenusController')
        ->names('contenus');
    
    Route::resource('roles', 'App\Http\Controllers\RolesController')
        ->names('roles');
    
    Route::resource('utilisateurs', 'App\Http\Controllers\UtilisateursController')
        ->names('utilisateurs');
    
    Route::resource('medias', 'App\Http\Controllers\MediasController')
        ->names('medias');
    
    Route::resource('typecontenus', 'App\Http\Controllers\TypeContenuesController')
        ->names('typecontenus');
    
    Route::resource('typemedias', 'App\Http\Controllers\TypeMediasController')
        ->names('typemedias');
    
    Route::resource('regions', 'App\Http\Controllers\RegionsController')
        ->names('regions');
    
    Route::resource('commentaires', 'App\Http\Controllers\CommentairesController')
        ->names('commentaires');
});