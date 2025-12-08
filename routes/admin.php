<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function(){
    // Routes avec préfixe 'admin.' pour éviter les conflits
    Route::resource('langues', 'App\Http\Controllers\LanguesController')
        ->names('admin.langues');
    
    Route::put('contenus/{contenu}/valider', ['App\Http\Controllers\ContenusController', 'valider'])
        ->name('admin.contenus.valider');
    
    Route::resource('contenus', 'App\Http\Controllers\ContenusController')
        ->names('admin.contenus');
    
    Route::resource('roles', 'App\Http\Controllers\RolesController')
        ->names('admin.roles');
    
    Route::resource('utilisateurs', 'App\Http\Controllers\UtilisateursController')
        ->names('admin.utilisateurs');
    
    Route::resource('medias', 'App\Http\Controllers\MediasController')
        ->names('admin.medias');
    
    Route::resource('typecontenus', 'App\Http\Controllers\TypeContenuesController')
        ->names('admin.typecontenus');
    
    Route::resource('typemedias', 'App\Http\Controllers\TypeMediasController')
        ->names('admin.typemedias');
    
    Route::resource('regions', 'App\Http\Controllers\RegionsController')
        ->names('admin.regions');
    
    Route::resource('commentaires', 'App\Http\Controllers\CommentairesController')
        ->names('admin.commentaires');
});