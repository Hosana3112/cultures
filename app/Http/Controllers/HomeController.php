<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenue;
use App\Models\Langue;
use App\Models\Utilisateur;
use App\Models\Media;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Page d'accueil publique
    public function index()
    {
        // Récupérer les types de contenu basés sur vos données
        $typesGastronomie = TypeContenue::where('nom', 'recette')->get();
        $typesContes = TypeContenue::whereIn('nom', ['legend', 'histoire', 'chant', 'danse'])->get();

        // Contenus pour la section gastronomie (UNIQUEMENT VALIDÉS) - Recettes
        $gastronomie_contenus = collect();
        if ($typesGastronomie->isNotEmpty()) {
            $typeIds = $typesGastronomie->pluck('id')->toArray();
            $gastronomie_contenus = Contenu::where('statut', 'Validé')
                ->whereIn('type_contenu_id', $typeIds)
                ->orderBy('date_creation', 'desc')
                ->take(6)
                ->get();
            
            // Charger manuellement les relations
            if ($gastronomie_contenus->isNotEmpty()) {
                $this->chargerRelationsContenus($gastronomie_contenus);
            }
        }

        // Contenus pour la section contes (UNIQUEMENT VALIDÉS) - Légendes, histoires, chants, danses
        $contes_contenus = collect();
        if ($typesContes->isNotEmpty()) {
            $typeIds = $typesContes->pluck('id')->toArray();
            $contes_contenus = Contenu::where('statut', 'Validé')
                ->whereIn('type_contenu_id', $typeIds)
                ->orderBy('date_creation', 'desc')
                ->take(6)
                ->get();
            
            // Charger manuellement les relations
            if ($contes_contenus->isNotEmpty()) {
                $this->chargerRelationsContenus($contes_contenus);
            }
        }

        // Langues avec leurs régions
        $langues = Langue::all();
        
        // Charger les régions pour les langues
        if ($langues->isNotEmpty()) {
            $regionIds = $langues->pluck('region_id')->filter()->unique();
            if ($regionIds->isNotEmpty()) {
                $regions = Region::whereIn('id', $regionIds)
                    ->get()
                    ->keyBy('id');
                
                foreach ($langues as $langue) {
                    $langue->region = $regions->get($langue->region_id);
                }
            }
        }

        return view('front.accueil', compact(
            'gastronomie_contenus',
            'contes_contenus',
            'langues'
        ));
    }

    /**
     * Charger manuellement les relations pour une collection de contenus
     */
    private function chargerRelationsContenus($contenus)
    {
        // Récupérer tous les IDs nécessaires
        $typeIds = $contenus->pluck('type_contenu_id')->filter()->unique();
        $auteurIds = $contenus->pluck('auteur_id')->filter()->unique();
        $contenuIds = $contenus->pluck('id');

        // Charger les types de contenu
        if ($typeIds->isNotEmpty()) {
            $types = TypeContenue::whereIn('id', $typeIds)
                ->get()
                ->keyBy('id');
        }

        // Charger les auteurs (utilisateurs)
        if ($auteurIds->isNotEmpty()) {
            $auteurs = Utilisateur::whereIn('id', $auteurIds)
                ->get()
                ->keyBy('id');
        }

        // Charger les médias
        if ($contenuIds->isNotEmpty()) {
            $medias = Media::whereIn('contenu_id', $contenuIds)
                ->get()
                ->groupBy('contenu_id');
        }

        // Attacher les relations à chaque contenu
        foreach ($contenus as $contenu) {
            // Type de contenu
            if (isset($types)) {
                $contenu->typeContenue = $types->get($contenu->type_contenu_id);
            }
            
            // Auteur
            if (isset($auteurs)) {
                $contenu->auteur = $auteurs->get($contenu->auteur_id);
                $contenu->utilisateur = $contenu->auteur; // Pour la compatibilité
            }
            
            // Médias
            if (isset($medias)) {
                $contenu->media = $medias->has($contenu->id) ? $medias[$contenu->id] : collect();
            }
        }
    }

    /**
     * Afficher un contenu spécifique avec ses commentaires
     */
    public function show($id)
    {
        // Charger le contenu avec toutes les relations nécessaires
        $contenu = Contenu::with([
            'auteur',
            'typeContenue',
            'media',
            'commentaires.utilisateur' // Charger les commentaires avec leurs auteurs
        ])->findOrFail($id);
        
        // Calcul des statistiques
        $noteMoyenne = $contenu->commentaires->avg('note') ?? 0;
        $nombreNotes = $contenu->commentaires->whereNotNull('note')->count();
        
        return view('front.show', compact('contenu', 'noteMoyenne', 'nombreNotes'));
    }

    /**
     * Page de recherche
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $typeId = $request->get('type');
        $regionId = $request->get('region');

        // Base query - seulement contenus validés
        $contenus = Contenu::where('statut', 'Validé');

        // Recherche par mot-clé
        if ($query) {
            $contenus->where(function($q) use ($query) {
                $q->where('titre', 'like', "%{$query}%")
                  ->orWhere('texte', 'like', "%{$query}%");
            });
        }

        // Filtre par type
        if ($typeId) {
            $contenus->where('type_contenu_id', $typeId);
        }

        // Filtre par région
        if ($regionId) {
            $contenus->where('region_id', $regionId);
        }

        $contenus = $contenus->orderBy('date_creation', 'desc')->paginate(12);

        // Charger les relations si nécessaire
        if ($contenus->isNotEmpty()) {
            $this->chargerRelationsContenus($contenus);
        }

        $types = TypeContenue::all();
        $regions = Region::all();

        return view('search', compact('contenus', 'types', 'regions', 'query', 'typeId', 'regionId'));
    }

    /**
     * Afficher les contenus par région
     */
    public function parRegion($regionId)
    {
        $region = Region::find($regionId);
        
        if (!$region) {
            return redirect()->route('front.accueil')
                ->with('error', 'Région non trouvée.');
        }

        $contenus = Contenu::where('statut', 'Validé')
            ->where('region_id', $regionId)
            ->orderBy('date_creation', 'desc')
            ->paginate(12);

        // Charger les relations
        if ($contenus->isNotEmpty()) {
            $this->chargerRelationsContenus($contenus);
        }

        return view('region', compact('contenus', 'region'));
    }

    /**
     * Afficher les contenus par type
     */
    public function parType($typeId)
    {
        $type = TypeContenue::find($typeId);
        
        if (!$type) {
            return redirect()->route('front.accueil')
                ->with('error', 'Type de contenu non trouvé.');
        }

        $contenus = Contenu::where('statut', 'Validé')
            ->where('type_contenu_id', $typeId)
            ->orderBy('date_creation', 'desc')
            ->paginate(12);

        // Charger les relations
        if ($contenus->isNotEmpty()) {
            $this->chargerRelationsContenus($contenus);
        }

        return view('type', compact('contenus', 'type'));
    }

    /**
     * Page FAQ
     */
    public function faq()
    {
        $faqs = [
            [
                'question' => 'Comment créer un contenu ?',
                'reponse' => 'Connectez-vous à votre compte, cliquez sur "Créer un contenu" dans le menu, remplissez le formulaire et soumettez-le pour validation.'
            ],
            [
                'question' => 'Combien de temps prend la validation d\'un contenu ?',
                'reponse' => 'Nos modérateurs examinent les contenus sous 24-48 heures. Vous recevrez une notification par email.'
            ],
            [
                'question' => 'Puis-je modifier un contenu après publication ?',
                'reponse' => 'Oui, en tant qu\'auteur, vous pouvez modifier votre contenu. Il repassera en validation après modification.'
            ],
            [
                'question' => 'Comment signaler un contenu inapproprié ?',
                'reponse' => 'Utilisez le bouton "Signaler" sur la page du contenu. Nos modérateurs examineront le signalement.'
            ],
        ];

        return view('faq', compact('faqs'));
    }
}