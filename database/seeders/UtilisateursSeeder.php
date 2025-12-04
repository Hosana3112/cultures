<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UtilisateursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $utilisateurs = [
            // Administrateurs
            [
                'nom' => 'COMLAN',
                'prenom' => 'Maurice',
                'email' => 'maurice.comlan@uac.bj',
                'mot_de_passe' => Hash::make('Eneam123'),
                'sexe' => 'M',
                'date_naissance' => '1985-03-15',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 1, // Fon
                'role_id' => 1, // Administrateur
                'date_inscription' => Carbon::now()->subYears(2),
                'created_at' => Carbon::now()->subYears(2),
                'updated_at' => Carbon::now()->subMonths(3),
            ],
            [
                'nom' => 'ZITTI',
                'prenom' => 'Hosana',
                'email' => 'zittihosana@gmail.com',
                'mot_de_passe' => Hash::make('hosana3112'),
                'sexe' => 'F',
                'date_naissance' => '1990-07-22',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 3, // Goun
                'role_id' => 1, // Administrateur
                'date_inscription' => Carbon::now()->subYear(),
                'created_at' => Carbon::now()->subYear(),
                'updated_at' => Carbon::now()->subMonths(1),
            ],

            // Modérateurs
            [
                'nom' => 'ZITTI',
                'prenom' => 'Vaik',
                'email' => 'inscription312@gmail.com',
                'mot_de_passe' => Hash::make('vaik3112'),
                'sexe' => 'M',
                'date_naissance' => '1992-11-08',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 2, // Dendi
                'role_id' => 2, // Modérateur
                'date_inscription' => Carbon::now()->subMonths(8),
                'created_at' => Carbon::now()->subMonths(8),
                'updated_at' => Carbon::now()->subWeeks(2),
            ],

            // Utilisateurs réguliers
            [
                'nom' => 'DOSSOU',
                'prenom' => 'Sèna',
                'email' => 'sena.dossou@gmail.com',
                'mot_de_passe' => Hash::make('dossousena'),
                'sexe' => 'F',
                'date_naissance' => '1998-09-12',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 5, // Adja
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(4),
                'created_at' => Carbon::now()->subMonths(4),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'nom' => 'BIAOU',
                'prenom' => 'Marc',
                'email' => 'marc.biaou@gmail.com',
                'mot_de_passe' => Hash::make('marcbiaou'),
                'sexe' => 'M',
                'date_naissance' => '1988-12-03',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 6, // Minan
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(3),
                'created_at' => Carbon::now()->subMonths(3),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'nom' => 'DAGNON',
                'prenom' => 'Pélagie',
                'email' => 'pelagie.dagnon@gmail.com',
                'mot_de_passe' => Hash::make('pelagiedagnon'),
                'sexe' => 'F',
                'date_naissance' => '1995-06-25',
                'statut' => 'En attente',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 1, // Fon
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(2),
                'created_at' => Carbon::now()->subMonths(2),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'nom' => 'ZITTI',
                'prenom' => 'Ginelda',
                'email' => 'hosanazitti@gmail.com',
                'mot_de_passe' => Hash::make('ginelda3112'),
                'sexe' => 'M',
                'date_naissance' => '1991-02-14',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 3, // Goun
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(5),
                'created_at' => Carbon::now()->subMonths(5),
                'updated_at' => Carbon::now()->subWeeks(3),
            ],
            [
                'nom' => 'GANDONOU',
                'prenom' => 'Ruth',
                'email' => 'ruth.gandonou@gmail.com',
                'mot_de_passe' => Hash::make('gandonou1234'),
                'sexe' => 'F',
                'date_naissance' => '1993-08-30',
                'statut' => 'Inactif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 2, // Dendi
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(7),
                'created_at' => Carbon::now()->subMonths(7),
                'updated_at' => Carbon::now()->subMonths(1),
            ],
            [
                'nom' => 'KINTO',
                'prenom' => 'Gaston',
                'email' => 'gaston.kinto@gmail.com',
                'mot_de_passe' => Hash::make('kintogaston'),
                'sexe' => 'M',
                'date_naissance' => '1987-05-17',
                'statut' => 'Actif',
                'photo_chemin' => null,
                'photo_nom_original' => null,
                'photo_mime_type' => null,
                'photo_taille' => null,
                'photo_description' => null,
                'langue_id' => 4, // Bariba
                'role_id' => 3, // Utilisateur
                'date_inscription' => Carbon::now()->subMonths(9),
                'created_at' => Carbon::now()->subMonths(9),
                'updated_at' => Carbon::now()->subWeeks(4),
            ],
        ];

        DB::table('utilisateurs')->insert($utilisateurs);
    }
}
