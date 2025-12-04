<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles = [
            [
                'nom' => 'Administrateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Moderateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
