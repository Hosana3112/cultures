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
        Schema::create('utilisateurs', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('mot_de_passe');
            $table->rememberToken();
            $table->enum('sexe', ['M', 'F']);
            $table->timestamp('date_inscription')->useCurrent();
            $table->date('date_naissance');
            $table->string('statut')->nullable();
            
            // Champs pour la photo comme dans la table medias
            $table->string('photo_chemin')->nullable();
            $table->string('photo_nom_original')->nullable();
            $table->string('photo_mime_type')->nullable();
            $table->integer('photo_taille')->nullable();
            $table->text('photo_description')->nullable();
            
            $table->unsignedInteger('langue_id');
            $table->foreign('langue_id')->references('id')->on('langues');

            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->default(3);//valeur par defaut role utilisateur

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};