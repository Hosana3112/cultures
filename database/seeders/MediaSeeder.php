<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medias = [
            // Médias pour la recette du Man Tindjan (contenu_id: 1)
            [
                'chemin' => 'adminlte/img/man-tindjan.webp',
                'nom_original' => 'man-tindjan.webp',
                'mime_type' => 'image/webp',
                'taille' => 1024576,
                'description' => 'Photo du plat Man Tindjan traditionnel',
                'type_media_id' => 1, // Image
                'contenu_id' => 1, // Recette du Man Tindjan
                'created_at' => Carbon::now()->subDays(14),
                'updated_at' => Carbon::now()->subDays(14),
            ],

            // Médias pour la sauce gombo (contenu_id: 2)
            [
                'chemin' => 'adminlte/img/gombo.webp',
                'nom_original' => 'gombo.webp',
                'mime_type' => 'image/webp',
                'taille' => 987654,
                'description' => 'Sauce gombo traditionnelle avec viande',
                'type_media_id' => 1, // Image
                'contenu_id' => 2, // Sauce Gombo Traditionnelle
                'created_at' => Carbon::now()->subDays(19),
                'updated_at' => Carbon::now()->subDays(19),
            ],

            // Médias pour le Télibo (contenu_id: 3)
            [
                'chemin' => 'adminlte/img/telibo.webp',
                'nom_original' => 'telibo.webp',
                'mime_type' => 'image/webp',
                'taille' => 876543,
                'description' => 'Boisson Télibo traditionnelle de mil',
                'type_media_id' => 1, // Image
                'contenu_id' => 3, // Télibo - Boisson Traditionnelle de Mil
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],

            // Médias pour le trône d'Abomey (contenu_id: 5)
            [
                'chemin' => 'adminlte/img/trone.webp',
                'nom_original' => 'trone.webp',
                'mime_type' => 'image/webp',
                'taille' => 1567890,
                'description' => 'Le trône royal d\'Abomey, symbole du pouvoir',
                'type_media_id' => 1, // Image
                'contenu_id' => 5, // Le Trône d\'Abomey
                'created_at' => Carbon::now()->subDays(29),
                'updated_at' => Carbon::now()->subDays(29),
            ],

            // Médias pour Tassi Hangbé (contenu_id: 6)
            [
                'chemin' => 'adminlte/img/amazone.jpeg',
                'nom_original' => 'amazone.jpeg',
                'mime_type' => 'image/jpeg',
                'taille' => 1345678,
                'description' => 'Représentation de Tassi Hangbé, la reine amazone',
                'type_media_id' => 1, // Image
                'contenu_id' => 6, // Tassi Hangbé - La Reine Amazone Oubliée
                'created_at' => Carbon::now()->subDays(11),
                'updated_at' => Carbon::now()->subDays(11),
            ],

            // Médias pour le roi Goho (contenu_id: 7)
            [
                'chemin' => 'adminlte/img/goho.webp',
                'nom_original' => 'goho.webp',
                'mime_type' => 'image/webp',
                'taille' => 1123456,
                'description' => 'Portrait du roi Goho, fondateur de Porto-Novo',
                'type_media_id' => 1, // Image
                'contenu_id' => 7, // Le Roi Goho et la Fondation de Porto-Novo
                'created_at' => Carbon::now()->subDays(17),
                'updated_at' => Carbon::now()->subDays(17),
            ],
        ];

        DB::table('medias')->insert($medias);
    }
}
