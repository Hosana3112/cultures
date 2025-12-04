<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class TypeContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'nom' => 'Recette',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Histoire',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Legend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Danse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('type_contenues')->insert($types);
    }
}
