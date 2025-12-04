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
        Schema::create('contenus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->longText('texte');
            $table->timestamp('date_creation')->useCurrent();
            $table->string('statut');

            $table->unsignedInteger('parend_id')->nullable();
            $table->timestamp('date_validation')->nullable();

            $table->unsignedInteger('type_contenu_id');
            $table->foreign('type_contenu_id')
                  ->references('id')
                  ->on('type_contenues');

            // Clé étrangère vers utilisateurs (auteur)
            $table->unsignedInteger('auteur_id');
            $table->foreign('auteur_id')
                  ->references('id')
                  ->on('utilisateurs');

            // Clé étrangère vers regions
            $table->unsignedInteger('region_id');
            $table->foreign('region_id')
                  ->references('id')
                  ->on('regions');

            // Clé étrangère vers utilisateurs (modérateur)
            $table->unsignedInteger('moderateur_id')->nullable();
            $table->foreign('moderateur_id')
                  ->references('id')
                  ->on('utilisateurs');

            // Clé étrangère parent_id vers contenus pour les contenus hiérarchiques
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('contenus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};