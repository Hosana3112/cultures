<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $commentaires = [
            // Commentaires pour la recette du Man Tindjan (contenu_id: 1)
            [
                'texte' => 'Excellente recette ! Je l\'ai testée hier et toute ma famille a adoré. Le maïs frais apporte vraiment une différence de goût.',
                'note' => 5,
                'date' => Carbon::now()->subDays(8),
                'user_id' => 5, // Marc BIAOU
                'contenu_id' => 1,
            ],
            [
                'texte' => 'Recette authentique, ça me rappelle mon enfance au village. Petite suggestion : ajouter un peu de pâte d\'arachide à la fin.',
                'note' => 4,
                'date' => Carbon::now()->subDays(6),
                'user_id' => 7, // Ginelda ZITTI
                'contenu_id' => 1,
            ],

            // Commentaires pour la sauce gombo (contenu_id: 2)
            [
                'texte' => 'La texture visqueuse du gombo est parfaite ! J\'ai utilisé du poisson frais et c\'était délicieux avec de l\'igname pilé.',
                'note' => 5,
                'date' => Carbon::now()->subDays(15),
                'user_id' => 9, // Gaston KINTO
                'contenu_id' => 2,
            ],
            [
                'texte' => 'Bonne recette de base. Personnellement, je préfère couper le gombo en rondelles plutôt que de le hacher, ça donne une texture différente.',
                'note' => 4,
                'date' => Carbon::now()->subDays(12),
                'user_id' => 4, // Sèna DOSSOU
                'contenu_id' => 2,
            ],

            // Commentaires pour le Télibo (contenu_id: 3)
            [
                'texte' => 'Boisson très rafraîchissante ! Parfaite pour la saison chaude. Le temps de fermentation est crucial pour le goût.',
                'note' => 5,
                'date' => Carbon::now()->subDays(4),
                'user_id' => 6, // Pélagie DAGNON
                'contenu_id' => 3,
            ],
            [
                'texte' => 'Intéressant, je ne connaissais pas cette boisson. Est-ce qu\'on peut utiliser d\'autres céréales que le mil ?',
                'note' => 3,
                'date' => Carbon::now()->subDays(2),
                'user_id' => 5, // Marc BIAOU
                'contenu_id' => 3,
            ],

            // Commentaires pour les masques du Guèlèdè (contenu_id: 4)
            [
                'texte' => 'Article très instructif ! J\'ai eu la chance d\'assister à une cérémonie Guèlèdè à Savè, c\'était magique.',
                'note' => 5,
                'date' => Carbon::now()->subDays(20),
                'user_id' => 1, // Maurice COMLAN
                'contenu_id' => 4,
            ],
            [
                'texte' => 'Notre patrimoine culturel est si riche. Merci de documenter et préserver ces traditions ancestrales.',
                'note' => 5,
                'date' => Carbon::now()->subDays(18),
                'user_id' => 2, // Hosana ZITTI
                'contenu_id' => 4,
            ],

            // Commentaires pour le trône d\'Abomey (contenu_id: 5)
            [
                'texte' => 'Fascinant ! J\'ai visité le musée d\'Abomey et vu ce trône. Votre article capture bien son importance historique.',
                'note' => 5,
                'date' => Carbon::now()->subDays(25),
                'user_id' => 8, // Ruth GANDONOU
                'contenu_id' => 5,
            ],
            [
                'texte' => 'L\'histoire du Dahomey mérite d\'être mieux connue. Article bien documenté avec des détails intéressants.',
                'note' => 4,
                'date' => Carbon::now()->subDays(22),
                'user_id' => 7, // Ginelda ZITTI
                'contenu_id' => 5,
            ],

            // Commentaires pour Tassi Hangbé (contenu_id: 6)
            [
                'texte' => 'Enfin un article sur Tassi Hangbé ! Les femmes ont joué un rôle crucial dans notre histoire, merci de le mettre en lumière.',
                'note' => 5,
                'date' => Carbon::now()->subDays(9),
                'user_id' => 4, // Sèna DOSSOU
                'contenu_id' => 6,
            ],
            [
                'texte' => 'Personnage historique fascinant. J\'aimerais en savoir plus sur son influence sur les Amazones.',
                'note' => 4,
                'date' => Carbon::now()->subDays(7),
                'user_id' => 9, // Gaston KINTO
                'contenu_id' => 6,
            ],

            // Commentaires pour le roi Goho (contenu_id: 7)
            [
                'texte' => 'En tant que Porto-Novien, je suis ravi de voir l\'histoire de notre ville documentée. Goho était un visionnaire !',
                'note' => 5,
                'date' => Carbon::now()->subDays(16),
                'user_id' => 3, // Vaik ZITTI
                'contenu_id' => 7,
            ],
            [
                'texte' => 'Article captivant. L\'histoire de la fondation de Porto-Novo montre l\'importance du leadership et de la vision.',
                'note' => 4,
                'date' => Carbon::now()->subDays(14),
                'user_id' => 6, // Pélagie DAGNON
                'contenu_id' => 7,
            ],
        ];

        DB::table('commentaires')->insert($commentaires);
    }
}
