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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id_commentaire');
            $table->text('texte');
            $table->integer('note');
            $table->timestamp('date')->useCurrent();

             $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('utilisateurs');

            // Clé étrangère vers contenus
            $table->unsignedInteger('contenu_id');
            $table->foreign('contenu_id')
                  ->references('id')
                  ->on('contenus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};