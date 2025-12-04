<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langues = [
            [
                'nom' => 'Fon',
                'code_langue' => 'fon',
                'description' => 'Langue fon parlée principalement au Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Dendi',
                'code_langue' => 'den',
                'description' => 'Langue dendi parlée au Bénin, Niger et Nigeria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Goun',
                'code_langue' => 'gun',
                'description' => 'Langue goun parlée principalement au Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bariba',
                'code_langue' => 'bba',
                'description' => 'Langue bariba parlée principalement au Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Adja',
                'code_langue' => 'ajg',
                'description' => 'Langue adja parlée principalement au Bénin et Togo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Minan',
                'code_langue' => 'mnp',
                'description' => 'Langue mina parlée principalement au Togo et Bénin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('langues')->insert($langues);
    }
}
