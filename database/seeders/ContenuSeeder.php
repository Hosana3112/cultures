<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne
use Carbon\Carbon; // Si vous utilisez Carbon
use Illuminate\Database\Seeder;

class ContenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $contenus = [
            // RECETTES
            [
                'titre' => 'Recette du Man Tindjan',
                'texte' => 'Le Man Tindjan est un plat traditionnel béninois à base de maïs frais. 

INGRÉDIENTS :
- 6 épis de maïs frais
- 2 tomates mûres
- 1 oignon moyen
- 2 gousses d\'ail
- 1 piment frais (optionnel)
- 200g de viande de bœuf ou de poulet
- Huile rouge
- Sel et épices au goût

PRÉPARATION :
1. Égrenez les épis de maïs pour obtenir les grains frais
2. Faites cuire les grains de maïs à l\'eau salée pendant 30 minutes
3. Pendant ce temps, préparez la sauce : hachez les tomates, oignon et ail
4. Faites revenir la viande avec l\'huile rouge
5. Ajoutez les tomates, oignon et ail hachés
6. Laissez mijoter 20 minutes
7. Incorporez le maïs cuit à la sauce
8. Laissez cuire encore 10 minutes à feu doux

Le Man Tindjan se déguste chaud, souvent accompagné de pâte d\'arachide.',
                'date_creation' => Carbon::now()->subDays(15),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(10),
                'type_contenu_id' => 1, // Recette
                'auteur_id' => 4, // Sèna DOSSOU
                'region_id' => 2, // Abomey
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'titre' => 'Sauce Gombo Traditionnelle',
                'texte' => 'La sauce gombo est un classique de la cuisine béninoise, appréciée pour sa texture visqueuse caractéristique.

INGRÉDIENTS :
- 500g de gombo frais
- 300g de viande (bœuf, chèvre ou poisson)
- 2 oignons
- 3 tomates
- 2 gousses d\'ail
- 1 cube d\'assaisonnement
- Huile de palme
- Piment
- Sel

PRÉPARATION :
1. Lavez et hachez finement le gombo
2. Dans une casserole, faites revenir la viande avec l\'huile de palme
3. Ajoutez les oignons émincés et l\'ail écrasé
4. Incorporez les tomates coupées en dés
5. Ajoutez 2 verres d\'eau et le cube d\'assaisonnement
6. Laissez cuire la viande jusqu\'à tendreté
7. Ajoutez le gombo haché et le piment
8. Laissez mijoter 15 minutes à feu doux

La sauce gombo est excellente avec de l\'igname pilé ou du riz.',
                'date_creation' => Carbon::now()->subDays(20),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(12),
                'type_contenu_id' => 1, // Recette
                'auteur_id' => 6, // Pélagie DAGNON
                'region_id' => 1, // Dassa
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(20),
                'updated_at' => Carbon::now()->subDays(12),
            ],
            [
                'titre' => 'Télibo - Boisson Traditionnelle de Mil',
                'texte' => 'Le Télibo est une boisson fermentée rafraîchissante à base de mil.

INGRÉDIENTS :
- 1 kg de mil
- 2 litres d\'eau
- Sucre (au goût)
- Feuilles de baobab (optionnel)

PRÉPARATION :
1. Lavez soigneusement le mil
2. Faites tremper le mil dans l\'eau pendant 24 heures
3. Égouttez et laissez germer pendant 48 heures en remuant régulièrement
4. Une fois germé, faites sécher les grains au soleil
5. Broyez les grains séchés pour obtenir une farine grossière
6. Mélangez la farine avec de l\'eau et laissez fermenter 24 heures
7. Filtrez le mélange et ajoutez du sucre au goût
8. Servez frais

Le Télibo est une boisson désaltérante très appréciée pendant les saisons chaudes.',
                'date_creation' => Carbon::now()->subDays(8),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(5),
                'type_contenu_id' => 1, // Recette
                'auteur_id' => 7, // Ginelda ZITTI
                'region_id' => 3, // Porto-Novo
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(5),
            ],

            // LÉGENDES
            [
                'titre' => 'Les Masques du Guèlèdè - Patrimoine de l\'UNESCO',
                'texte' => 'La tradition des masques Guèlèdè est classée au patrimoine culturel immatériel de l\'UNESCO. Cette pratique sociale remonte au XVIIIe siècle chez les communautés Yoruba-Nago.

ORIGINE :
Les masques Guèlèdè sont nés dans l\'ancien royaume de Kétou. Selon la légende, ils furent créés par Yéyé, une femme sage qui voulait apaiser les tensions entre les hommes et les femmes.

SYMBOLISME :
- Les masques représentent souvent des animaux (serpent, oiseau) ou des figures humaines
- Ils incarnent les forces de la nature et les esprits ancestraux
- Chaque masque a une signification particulière liée à la protection, la fertilité ou la sagesse

CÉRÉMONIE :
Les danses Guèlèdè ont lieu la nuit, éclairées par des torches. Les danseurs portent des costumes colorés et des masques sculptés dans le bois, exécutant des mouvements gracieux qui racontent des histoires ancestrales.',
                'date_creation' => Carbon::now()->subDays(25),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(18),
                'type_contenu_id' => 3, // Legende
                'auteur_id' => 5, // Marc BIAOU
                'region_id' => 4, // Ganvié
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(25),
                'updated_at' => Carbon::now()->subDays(18),
            ],

            // HISTOIRES
            [
                'titre' => 'Le Trône d\'Abomey - Symbole du Royaume du Dahomey',
                'texte' => 'Le trône royal d\'Abomey, appelé "Assin", est bien plus qu\'un simple siège. Il incarne l\'autorité et la continuité du royaume du Dahomey.

HISTORIQUE :
Le trône fut commandé par le roi Agadja au début du XVIIIe siècle. Sculpté dans un seul bloc de bois d\'iroko, il est orné de symboles racontant l\'histoire du royaume.

SYMBOLES :
- Les crânes d\'animaux représentent la puissance guerrière
- Les chaînes en argent symbolisent l\'unité du royaume
- Les perles colorées indiquent la richesse et le commerce
- Les figures humaines rappellent les ancêtres fondateurs

LEGENDES :
On raconte que le trône possède des pouvoirs mystiques. Il serait capable de reconnaître les véritables héritiers du trône et de rejeter les imposteurs. Pendant les cérémonies d\'intronisation, le nouveau roi doit s\'asseoir sur le trône pendant trois jours et trois nuits pour recevoir la sagesse des ancêtres.',
                'date_creation' => Carbon::now()->subDays(30),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(22),
                'type_contenu_id' => 2, // Histoire
                'auteur_id' => 9, // Gaston KINTO
                'region_id' => 2, // Abomey
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(30),
                'updated_at' => Carbon::now()->subDays(22),
            ],
            [
                'titre' => 'Tassi Hangbé - La Reine Amazone Oubliée',
                'texte' => 'Tassi Hangbé est une figure historique méconnue qui régna brièvement sur le Dahomey au début du XVIIIe siècle.

HISTOIRE :
Selon la tradition orale, Tassi Hangbé était la sœur jumelle du roi Akaba. À la mort de ce dernier vers 1716, elle assura la régence en attendant que le fils d\'Akaba soit en âge de régner. Mais son leadership exceptionnel lui permit de conserver le pouvoir.

ACCOMPLISSEMENTS :
- Elle réorganisa l\'armée et créa de nouvelles tactiques militaires
- Elle renforça le corps des Amazones, les redoutables guerrières du Dahomey
- Elle établit de nouvelles relations commerciales avec les Européens
- Elle promut les arts et l\'artisanat féminin

HÉRITAGE :
Bien que son règne ait été court, Tassi Hangbé laissa une empreinte durable. Elle fut la première et seule femme à diriger directement le royaume du Dahomey, ouvrant la voie aux futures reines-mères influentes.',
                'date_creation' => Carbon::now()->subDays(12),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(7),
                'type_contenu_id' => 2, // Histoire
                'auteur_id' => 2, // Hosana ZITTI
                'region_id' => 2, // Abomey
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(12),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'titre' => 'Le Roi Goho et la Fondation de Porto-Novo',
                'texte' => 'L\'histoire du roi Goho est intimement liée à la fondation de Porto-Novo, capitale actuelle du Bénin.

ORIGINES :
Goho, aussi appelé Gbèzé, était un prince du royaume d\'Allada. Au XVIIe siècle, il quitta sa terre natale avec ses partisans à la recherche d\'un nouveau territoire.

FONDATION :
La légende raconte que Goho et son peuple s\'installèrent d\'abord près de la lagune. Un jour, un chef local nommé Tê-Agbanlin leur offrit l\'hospitalité. Impressionné par la sagesse de Goho, Tê-Agganlin lui donna sa fille en mariage et lui céda une partie de ses terres.

LE NOUVEAU PORT :
Goho, visionnaire, comprit l\'importance stratégique de la côte. Il développa les relations avec les navigateurs portugais, créant ainsi le "Porto Novo" (Nouveau Port) qui deviendra un centre commercial important.

HÉRITAGE :
Le roi Goho établit les bases du royaume de Hogbonu (ancien nom de Porto-Novo) et instaura un système de gouvernement qui perdurera pendant des siècles. Sa descendance règnera sur la ville jusqu\'à la colonisation française.',
                'date_creation' => Carbon::now()->subDays(18),
                'statut' => 'Validé',
                'parent_id' => null,
                'date_validation' => Carbon::now()->subDays(13),
                'type_contenu_id' => 2, // Histoire
                'auteur_id' => 1, // Maurice COMLAN
                'region_id' => 3, // Porto-Novo
                'moderateur_id' => 3, // Vaik ZITTI
                'created_at' => Carbon::now()->subDays(18),
                'updated_at' => Carbon::now()->subDays(13),
            ],
        ];

        DB::table('contenus')->insert($contenus);
    }
}
