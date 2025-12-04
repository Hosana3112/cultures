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
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chemin');
            $table->string('nom_original');
            $table->string('mime_type')->nullable();
            $table->integer('taille')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('type_media_id');
            $table->foreign('type_media_id')->references('id')->on('type_medias');

            
            $table->unsignedInteger('contenu_id');
            $table->foreign('contenu_id')->references('id')->on('contenus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};