<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenue;
use App\Models\Utilisateur;
use App\Models\Region;
use App\Models\Media;
use App\Models\Commentaire;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContenusController extends Controller
{
    // Page d'accueil frontend
    public function accueil()
    {
        // Récupérer les contenus validés
        $contenusValides = Contenu::where('statut', 'Validé')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Initialiser les collections
        $gastronomie_contenus = collect();
        $contes_contenus = collect();
        
        // Récupérer les types de contenu pour classification
        $typesContenus = TypeContenue::all()->keyBy('id');
        
        // Séparer les contenus par type
        foreach ($contenusValides as $contenu) {
            $type = $typesContenus->get($contenu->type_contenu_id);
            
            if ($type) {
                $typeNom = strtolower($type->nom);
                
                // Ajouter l'auteur au contenu
                $contenu->auteur = Utilisateur::find($contenu->auteur_id);
                
                // Ajouter les médias au contenu
                $contenu->media = Media::where('contenu_id', $contenu->id)->get();
                
                // Ajouter le type de contenu
                $contenu->typeContenue = $type;
                
                // Classer par catégorie
                if (Str::contains($typeNom, ['gastronomie', 'recette', 'cuisine', 'nourriture'])) {
                    $gastronomie_contenus->push($contenu);
                } elseif (Str::contains($typeNom, ['conte', 'légende', 'histoire', 'mythe'])) {
                    $contes_contenus->push($contenu);
                }
            }
        }
        
        // Limiter à 6 par catégorie
        $gastronomie_contenus = $gastronomie_contenus->take(6);
        $contes_contenus = $contes_contenus->take(6);
        
        // Récupérer les langues
        $langues = Langue::all();
        
        // Ajouter les régions aux langues
        foreach ($langues as $langue) {
            $langue->region = Region::find($langue->region_id);
        }

        return view('front.accueil', compact(
            'gastronomie_contenus', 
            'contes_contenus',
            'langues'
        ));
    }

    // Admin/Modo - TOUS LES CONTENUS (Dashboard admin)
    public function index()
    {
        $user = Auth::user();
        
        // Vérifier si l'utilisateur est admin (1) ou modérateur (2)
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        if ($user->role_id == 2) { // 2 = Modérateur
            $contenus = Contenu::where('statut', '!=', 'Validé')
                ->orderBy('created_at', 'desc')
                ->get();
        } else { // 1 = Admin
            $contenus = Contenu::orderBy('created_at', 'desc')->get();
        }
        
        // Charger manuellement les relations
        if ($contenus->isNotEmpty()) {
            // Récupérer tous les IDs nécessaires
            $contenuIds = $contenus->pluck('id');
            $typeIds = $contenus->pluck('type_contenu_id')->filter()->unique();
            $regionIds = $contenus->pluck('region_id')->filter()->unique();
            $auteurIds = $contenus->pluck('auteur_id')->filter()->unique();
            
            // Charger les données en une seule requête
            $medias = Media::whereIn('contenu_id', $contenuIds)->get()->groupBy('contenu_id');
            $types = TypeContenue::whereIn('id', $typeIds)->get()->keyBy('id');
            $regions = Region::whereIn('id', $regionIds)->get()->keyBy('id');
            $auteurs = Utilisateur::whereIn('id', $auteurIds)->get()->keyBy('id');
            
            // Attacher les relations
            foreach ($contenus as $contenu) {
                $contenu->media = $medias->get($contenu->id, collect());
                $contenu->typeContenue = $types->get($contenu->type_contenu_id);
                $contenu->region = $regions->get($contenu->region_id);
                $contenu->utilisateur = $auteurs->get($contenu->auteur_id);
            }
        }
    
        return view('contenus.index', compact('contenus'));
    }

    // Page de création de contenu
    public function create()
    {
        $typecontenus = TypeContenue::all();
        $regions = Region::all();

        return view('contenus.create', compact('typecontenus', 'regions'));
    }

    // Stocker un nouveau contenu
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|min:100|max:5000',
            'type_contenu_id' => 'required|integer|exists:type_contenues,id',
            'region_id' => 'required|integer|exists:regions,id',
            'duree_lecture' => 'nullable|string|max:50',
            'medias' => 'nullable|array|max:10',
            'medias.*' => 'file|mimes:jpg,jpeg,png,gif,webp,mp4,avi,mov,wmv|max:10240'
        ]);

        try {
            // Créer le contenu
            $contenu = Contenu::create([
                'titre' => $request->titre,
                'texte' => $request->description,
                'type_contenu_id' => $request->type_contenu_id,
                'region_id' => $request->region_id,
                'auteur_id' => Auth::id(),
                'duree_lecture' => $request->duree_lecture,
                'statut' => 'en attente',
                'parent_id' => null,
                'date_validation' => null,
                'moderateur_id' => null,
                'date_creation' => now()
            ]);

            // Gérer l'upload des médias
            if ($request->hasFile('medias')) {
                foreach ($request->file('medias') as $mediaFile) {
                    $chemin = $mediaFile->store('medias', 'public');
                    
                    Media::create([
                        'contenu_id' => $contenu->id,
                        'chemin' => $chemin,
                        'type_fichier' => $mediaFile->getMimeType(),
                        'nom_original' => $mediaFile->getClientOriginalName(),
                        'taille' => $mediaFile->getSize(),
                        'est_principal' => false
                    ]);
                }
            }

            return redirect()->route('contenus.show', $contenu->id)
                ->with('success', 'Contenu créé avec succès et en attente de validation.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la création du contenu: ' . $e->getMessage());
        }
    }

    // Afficher un contenu
    public function show($id)
    {
        // Récupérer le contenu
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
        
        // Vérifier si l'utilisateur peut voir le contenu
        $peutVoir = false;
        
        if ($contenu->statut === 'Validé') {
            $peutVoir = true;
        } elseif ($user) {
            if ($contenu->auteur_id === $user->id || 
                $user->role_id == 1 || 
                $user->role_id == 2) {
                $peutVoir = true;
            }
        }
        
        if (!$peutVoir) {
            return redirect()->route('front.accueil')
                ->with('error', 'Ce contenu n\'est pas disponible ou est en cours de validation.');
        }

        // Charger les relations manuellement
        $contenu->media = Media::where('contenu_id', $contenu->id)->get();
        $contenu->typeContenue = TypeContenue::find($contenu->type_contenu_id);
        $contenu->region = Region::find($contenu->region_id);
        $contenu->utilisateur = Utilisateur::find($contenu->auteur_id);

        // Récupérer les commentaires
        $commentaires = Commentaire::where('contenu_id', $contenu->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Charger les utilisateurs pour chaque commentaire
        $utilisateurIds = $commentaires->pluck('utilisateur_id')->filter()->unique();
        if ($utilisateurIds->isNotEmpty()) {
            $utilisateurs = Utilisateur::whereIn('id', $utilisateurIds)
                ->get()
                ->keyBy('id');
            
            foreach ($commentaires as $commentaire) {
                $commentaire->utilisateur = $utilisateurs->get($commentaire->utilisateur_id);
            }
        }

        // Calculer la note moyenne
        $noteMoyenne = $commentaires->avg('note') ?? 0;
        $nombreNotes = $commentaires->count();

        return view('contenus.show', compact(
            'contenu', 
            'noteMoyenne', 
            'nombreNotes', 
            'commentaires'
        ));
    }

    // Éditer un contenu
    public function edit($id)
    {
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est l'auteur ou admin
        if ($contenu->auteur_id !== $user->id && $user->role_id != 1) {
            return redirect()->route('contenus.show', $contenu)
                ->with('error', 'Vous n\'êtes pas autorisé à modifier ce contenu.');
        }

        // Charger les médias du contenu
        $contenu->media = Media::where('contenu_id', $contenu->id)->get();

        $typecontenus = TypeContenue::all();
        $regions = Region::all();

        return view('contenus.edit', compact('contenu', 'typecontenus', 'regions'));
    }

    // Mettre à jour un contenu
    public function update(Request $request, $id)
    {
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est l'auteur ou admin
        if ($contenu->auteur_id !== $user->id && $user->role_id != 1) {
            return redirect()->route('contenus.show', $contenu)
                ->with('error', 'Vous n\'êtes pas autorisé à modifier ce contenu.');
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|min:100|max:5000',
            'type_contenu_id' => 'required|integer|exists:type_contenues,id',
            'region_id' => 'required|integer|exists:regions,id',
            'duree_lecture' => 'nullable|string|max:50',
            'medias' => 'nullable|array|max:10',
            'medias.*' => 'file|mimes:jpg,jpeg,png,gif,webp,mp4,avi,mov,wmv|max:10240',
            'medias_supprimes' => 'nullable|array'
        ]);

        // Mettre à jour le contenu
        $contenu->update([
            'titre' => $request->titre,
            'texte' => $request->description,
            'type_contenu_id' => $request->type_contenu_id,
            'region_id' => $request->region_id,
            'duree_lecture' => $request->duree_lecture,
            'statut' => 'en attente'
        ]);

        // Supprimer les médias sélectionnés
        if ($request->has('medias_supprimes')) {
            foreach ($request->medias_supprimes as $mediaId) {
                $media = Media::find($mediaId);
                if ($media && $media->contenu_id === $contenu->id) {
                    if (Storage::disk('public')->exists($media->chemin)) {
                        Storage::disk('public')->delete($media->chemin);
                    }
                    $media->delete();
                }
            }
        }

        // Ajouter de nouveaux médias
        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $mediaFile) {
                $chemin = $mediaFile->store('medias', 'public');
                
                Media::create([
                    'contenu_id' => $contenu->id,
                    'chemin' => $chemin,
                    'type_fichier' => $mediaFile->getMimeType(),
                    'nom_original' => $mediaFile->getClientOriginalName(),
                    'taille' => $mediaFile->getSize(),
                    'est_principal' => false
                ]);
            }
        }

        return redirect()->route('contenus.show', $contenu->id)
            ->with('success', 'Contenu mis à jour avec succès.');
    }

    // Supprimer un contenu
    public function destroy($id)
    {
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
        
        // Vérifier que l'utilisateur est l'auteur ou admin
        if ($contenu->auteur_id !== $user->id && $user->role_id != 1) {
            return redirect()->route('contenus.show', $contenu)
                ->with('error', 'Vous n\'êtes pas autorisé à supprimer ce contenu.');
        }

        // Récupérer et supprimer les médias
        $medias = Media::where('contenu_id', $contenu->id)->get();
        foreach ($medias as $media) {
            if (Storage::disk('public')->exists($media->chemin)) {
                Storage::disk('public')->delete($media->chemin);
            }
            $media->delete();
        }

        // Supprimer les commentaires
        Commentaire::where('contenu_id', $contenu->id)->delete();
        
        // Supprimer le contenu
        $contenu->delete();

        // Redirection selon le rôle
        if ($user->role_id == 1 || $user->role_id == 2) {
            return redirect()->route('contenus.index')
                ->with('success', 'Contenu supprimé avec succès.');
        }

        return redirect()->route('front.accueil')
            ->with('success', 'Contenu supprimé avec succès.');
    }

    /**
     * Valider un contenu
     */
    public function valider($id)
    {
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
    
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('contenus.show', $contenu)
                ->with('error', 'Vous n\'avez pas les permissions pour valider ce contenu.');
        }

        $contenu->update([
            'statut' => 'Validé',
            'moderateur_id' => $user->id,
            'date_validation' => now()
        ]);

        return redirect()->route('contenus.show', $contenu)
            ->with('success', 'Contenu validé avec succès.');
    }

    /**
     * Rejeter un contenu
     */
    public function rejeter($id)
    {
        $contenu = Contenu::find($id);
        
        if (!$contenu) {
            return redirect()->route('front.accueil')
                ->with('error', 'Contenu non trouvé.');
        }
        
        $user = Auth::user();
    
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('contenus.show', $contenu)
                ->with('error', 'Vous n\'avez pas les permissions pour rejeter ce contenu.');
        }

        $contenu->update([
            'statut' => 'Rejeté',
            'moderateur_id' => $user->id,
            'date_validation' => now()
        ]);

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu rejeté avec succès.');
    }

    // Dans ContenusController.php - AJOUTEZ CETTE MÉTHODE
public function createFront()
{
    $typecontenus = TypeContenue::all();
    $regions = Region::all();
    
    // Logique spécifique au front si nécessaire
    $categoriesPopulaires = TypeContenue::whereIn('nom', ['recette', 'legend', 'histoire'])
        ->get();
    
    return view('front.create', compact(
        'typecontenus', 
        'regions',
        'categoriesPopulaires'
    ));
}

    /**
     * Afficher les contenus en attente
     */
    public function enAttente()
    {
        $user = Auth::user();
        
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }

        $contenus = Contenu::where('statut', 'en attente')
            ->orderBy('created_at', 'desc')
            ->get();

        // Charger les relations
        if ($contenus->isNotEmpty()) {
            $contenuIds = $contenus->pluck('id');
            $typeIds = $contenus->pluck('type_contenu_id')->filter()->unique();
            $regionIds = $contenus->pluck('region_id')->filter()->unique();
            $auteurIds = $contenus->pluck('auteur_id')->filter()->unique();
            
            $medias = Media::whereIn('contenu_id', $contenuIds)->get()->groupBy('contenu_id');
            $types = TypeContenue::whereIn('id', $typeIds)->get()->keyBy('id');
            $regions = Region::whereIn('id', $regionIds)->get()->keyBy('id');
            $auteurs = Utilisateur::whereIn('id', $auteurIds)->get()->keyBy('id');
            
            foreach ($contenus as $contenu) {
                $contenu->media = $medias->get($contenu->id, collect());
                $contenu->typeContenue = $types->get($contenu->type_contenu_id);
                $contenu->region = $regions->get($contenu->region_id);
                $contenu->utilisateur = $auteurs->get($contenu->auteur_id);
            }
        }

        return view('contenus.en-attente', compact('contenus'));
    }
}