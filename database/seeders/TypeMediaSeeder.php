<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class TypeMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'nom' => 'Image',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Vidéo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Audio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Document',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('type_medias')->insert($types);
    }
}
