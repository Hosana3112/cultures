<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class ParlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $parler = [
            // Région Dassa (id: 1)
            [
                'langue_id' => 1, // Fon
                'region_id' => 1, // Dassa
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 4, // Bariba
                'region_id' => 1, // Dassa
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 2, // Dendi
                'region_id' => 1, // Dassa
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Région Abomey (id: 2)
            [
                'langue_id' => 1, // Fon
                'region_id' => 2, // Abomey
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 3, // Goun
                'region_id' => 2, // Abomey
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 5, // Adja
                'region_id' => 2, // Abomey
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Région Porto-Novo (id: 3)
            [
                'langue_id' => 3, // Goun
                'region_id' => 3, // Porto-Novo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 1, // Fon
                'region_id' => 3, // Porto-Novo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 6, // Minan
                'region_id' => 3, // Porto-Novo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Région Ganvié (id: 4)
            [
                'langue_id' => 1, // Fon
                'region_id' => 4, // Ganvié
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 3, // Goun
                'region_id' => 4, // Ganvié
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'langue_id' => 2, // Dendi
                'region_id' => 4, // Ganvié
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('parler')->insert($parler);
    }
}
