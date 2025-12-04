<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $regions = [
            [
                'nom_region' => 'Dassa',
                'description' => 'Région de Dassa-Zoumè, connue pour ses collines et son patrimoine culturel',
                'population' => 112000,
                'superficie' => 5150,
                'localisation' => 'Département des Collines',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Abomey',
                'description' => 'Ancienne capitale du Royaume du Dahomey, riche en histoire et patrimoine royal',
                'population' => 90000,
                'superficie' => 142,
                'localisation' => 'Département du Zou',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Porto-Novo',
                'description' => 'Capitale administrative du Bénin, ville historique avec architecture brésilienne',
                'population' => 264000,
                'superficie' => 110,
                'localisation' => 'Département de l\'Ouémé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Ganvié',
                'description' => 'Cité lacustre unique en Afrique, surnommée la "Venise de l\'Afrique"',
                'population' => 30000,
                'superficie' => 48,
                'localisation' => 'Département de l\'Atlantique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('regions')->insert($regions);
    }
}
