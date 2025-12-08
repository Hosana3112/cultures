<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Utilisateur;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentairesController extends Controller
{
    /**
     * Afficher la liste des commentaires (admin)
     */
    public function index()
    {
        $user = Auth::user();
        
        // Vérifier si c'est un admin ou modérateur
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        // Utiliser la colonne 'date' au lieu de 'created_at'
        $commentaires = Commentaire::orderBy('date', 'desc')->paginate(20);
        
        // Charger manuellement les relations
        if ($commentaires->isNotEmpty()) {
            // Récupérer tous les IDs nécessaires
            $utilisateurIds = $commentaires->pluck('utilisateur_id')->filter()->unique();
            $contenuIds = $commentaires->pluck('contenu_id')->filter()->unique();
            
            // Charger les utilisateurs en une seule requête
            if ($utilisateurIds->isNotEmpty()) {
                $utilisateurs = Utilisateur::whereIn('id', $utilisateurIds)
                    ->get()
                    ->keyBy('id');
                
                foreach ($commentaires as $commentaire) {
                    $commentaire->utilisateur = $utilisateurs->get($commentaire->utilisateur_id);
                }
            }
            
            // Charger les contenus en une seule requête
            if ($contenuIds->isNotEmpty()) {
                $contenus = Contenu::whereIn('id', $contenuIds)
                    ->get()
                    ->keyBy('id');
                
                foreach ($commentaires as $commentaire) {
                    $commentaire->contenu = $contenus->get($commentaire->contenu_id);
                }
            }
        }
            
        return view('commentaires.index', compact('commentaires'));
    }

    /**
     * Afficher le formulaire de création (admin)
     */
    public function create()
    {
        $user = Auth::user();
        
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::where('statut', 'Validé')->get();
        
        return view('commentaires.create', compact('utilisateurs', 'contenus'));
    }

    /**
     * Stocker un commentaire (AJAX pour frontend, normal pour admin)
     */
    public function store(Request $request)
    {
        // Si c'est une requête AJAX (depuis le frontend)
        if ($request->ajax()) {
            return $this->storeAjax($request);
        }
        
        // Si c'est une requête normale (depuis l'admin)
        return $this->storeAdmin($request);
    }
    
    /**
     * Stocker un commentaire via AJAX (frontend) - CORRIGÉ
     */
    private function storeAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'texte' => 'required|string|min:10|max:1000', // CHANGÉ : 'texte' au lieu de 'commentaire'
            'note' => 'required|integer|min:1|max:5',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ], [
            'texte.required' => 'Le commentaire est obligatoire.', // CHANGÉ
            'texte.min' => 'Le commentaire doit avoir au moins 10 caractères.', // CHANGÉ
            'note.required' => 'La note est obligatoire.',
            'note.min' => 'La note doit être entre 1 et 5.',
            'note.max' => 'La note doit être entre 1 et 5.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Vérifier que le contenu est validé
        $contenu = Contenu::find($request->contenu_id);
        if (!$contenu) {
            return response()->json([
                'success' => false,
                'message' => 'Contenu non trouvé.'
            ], 404);
        }

        if ($contenu->statut !== 'Validé') {
            return response()->json([
                'success' => false,
                'message' => 'Vous ne pouvez pas commenter un contenu non validé.'
            ], 403);
        }

        try {
            $commentaire = Commentaire::create([
                'commentaire' => $request->texte, // CHANGÉ : $request->texte au lieu de $request->commentaire
                'note' => $request->note,
                'utilisateur_id' => Auth::id(),
                'contenu_id' => $request->contenu_id,
                'date' => now()
            ]);

            // Récupérer l'utilisateur
            $utilisateur = Utilisateur::find(Auth::id());

            // Calculer les nouvelles statistiques
            $tousCommentaires = Commentaire::where('contenu_id', $contenu->id)->get();
            $noteMoyenne = $tousCommentaires->avg('note') ?? 0;
            $nombreNotes = $tousCommentaires->count();

            return response()->json([
                'success' => true,
                'message' => 'Commentaire publié avec succès!',
                'commentaire' => [
                    'id' => $commentaire->id,
                    'user_name' => $utilisateur->prenom ?? 'Utilisateur',
                    'user_id' => $commentaire->utilisateur_id,
                    'commentaire' => $commentaire->commentaire,
                    'note' => $commentaire->note,
                    'date' => $commentaire->date->format('d F Y à H:i')
                ],
                'noteMoyenne' => round($noteMoyenne, 1),
                'nombreNotes' => $nombreNotes
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la publication du commentaire.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Stocker un commentaire via admin panel
     */
    private function storeAdmin(Request $request)
    {
        $request->validate([
            'commentaire' => 'required|string|min:10|max:1000',
            'note' => 'required|integer|min:1|max:5',
            'user_id' => 'required|integer|exists:utilisateurs,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]);

        // Vérifier que le contenu est validé
        $contenu = Contenu::find($request->contenu_id);
        if ($contenu->statut !== 'Validé') {
            return redirect()->back()
                ->with('error', 'Vous ne pouvez pas commenter un contenu non validé.')
                ->withInput();
        }

        Commentaire::create([
            'commentaire' => $request->commentaire,
            'note' => $request->note,
            'utilisateur_id' => $request->user_id,
            'contenu_id' => $request->contenu_id,
            'date' => now()
        ]);

        return redirect()->route('commentaires.index')
            ->with('success', 'Commentaire créé avec succès.');
    }

    /**
     * Afficher un commentaire spécifique
     */
    public function show($id)
    {
        $commentaire = Commentaire::find($id);
        
        if (!$commentaire) {
            return redirect()->route('commentaires.index')
                ->with('error', 'Commentaire non trouvé.');
        }
        
        // Charger les relations manuellement
        $commentaire->utilisateur = Utilisateur::find($commentaire->utilisateur_id);
        $commentaire->contenu = Contenu::find($commentaire->contenu_id);
        
        return view('commentaires.show', compact('commentaire'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $user = Auth::user();
        
        // Vérifier les permissions
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        $commentaire = Commentaire::find($id);
        
        if (!$commentaire) {
            return redirect()->route('commentaires.index')
                ->with('error', 'Commentaire non trouvé.');
        }
        
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::where('statut', 'Validé')->get();
        
        return view('commentaires.edit', compact('commentaire', 'utilisateurs', 'contenus'));
    }

    /**
     * Mettre à jour un commentaire
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        
        // Vérifier les permissions
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        $commentaire = Commentaire::find($id);
        
        if (!$commentaire) {
            return redirect()->route('commentaires.index')
                ->with('error', 'Commentaire non trouvé.');
        }
        
        $request->validate([
            'commentaire' => 'required|string|min:10|max:1000',
            'note' => 'required|integer|min:1|max:5',
            'user_id' => 'required|integer|exists:utilisateurs,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]);

        $commentaire->update([
            'commentaire' => $request->commentaire,
            'note' => $request->note,
            'utilisateur_id' => $request->user_id,
            'contenu_id' => $request->contenu_id
        ]);

        return redirect()->route('commentaires.index')
            ->with('success', 'Commentaire mis à jour avec succès.');
    }

    /**
     * Supprimer un commentaire (AJAX ou normal)
     */
    public function destroy(Request $request, $id = null)
    {
        // Si c'est une requête AJAX
        if ($request->ajax()) {
            $commentaire = Commentaire::find($id);
            if (!$commentaire) {
                return response()->json([
                    'success' => false,
                    'message' => 'Commentaire non trouvé.'
                ], 404);
            }
            return $this->destroyAjax($commentaire);
        }
        
        // Si c'est une requête normale
        if ($id) {
            $commentaire = Commentaire::find($id);
            if (!$commentaire) {
                return redirect()->route('commentaires.index')
                    ->with('error', 'Commentaire non trouvé.');
            }
            return $this->destroyAdmin($commentaire);
        }
        
        return redirect()->route('commentaires.index')
            ->with('error', 'ID du commentaire manquant.');
    }
    
    /**
     * Supprimer un commentaire via AJAX
     */
    private function destroyAjax(Commentaire $commentaire)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Vous devez être connecté.'
            ], 401);
        }
        
        // Vérifier que l'utilisateur est l'auteur du commentaire ou l'auteur du contenu ou admin/modo
        $isAuthor = $commentaire->utilisateur_id === $user->id;
        
        // Récupérer le contenu pour vérifier l'auteur
        $contenu = Contenu::find($commentaire->contenu_id);
        $isContentAuthor = $contenu && $contenu->auteur_id === $user->id;
        
        $isAdminOrModo = in_array($user->role_id, [1, 2]);
        
        if (!$isAuthor && !$isContentAuthor && !$isAdminOrModo) {
            return response()->json([
                'success' => false,
                'message' => 'Vous n\'êtes pas autorisé à supprimer ce commentaire.'
            ], 403);
        }

        try {
            $contenuId = $commentaire->contenu_id;
            $commentaire->delete();
            
            // Recalculer la note moyenne
            $tousCommentaires = Commentaire::where('contenu_id', $contenuId)->get();
            $noteMoyenne = $tousCommentaires->avg('note') ?? 0;
            $nombreNotes = $tousCommentaires->count();

            return response()->json([
                'success' => true,
                'message' => 'Commentaire supprimé avec succès!',
                'noteMoyenne' => round($noteMoyenne, 1),
                'nombreNotes' => $nombreNotes
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du commentaire.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Supprimer un commentaire via admin panel
     */
    private function destroyAdmin(Commentaire $commentaire)
    {
        $user = Auth::user();
        
        if (!$user || !in_array($user->role_id, [1, 2])) {
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé.');
        }
        
        $commentaire->delete();

        return redirect()->route('commentaires.index')
            ->with('success', 'Commentaire supprimé avec succès.');
    }

    /**
     * Récupérer les commentaires d'un contenu (API)
     */
    public function getByContenu($contenuId)
    {
        $commentaires = Commentaire::where('contenu_id', $contenuId)
            ->orderBy('date', 'desc')
            ->get();
        
        // Charger les utilisateurs
        $utilisateurIds = $commentaires->pluck('utilisateur_id')->filter()->unique();
        
        if ($utilisateurIds->isNotEmpty()) {
            $utilisateurs = Utilisateur::whereIn('id', $utilisateurIds)
                ->get()
                ->keyBy('id');
            
            $commentairesFormatted = [];
            foreach ($commentaires as $commentaire) {
                $utilisateur = $utilisateurs->get($commentaire->utilisateur_id);
                
                $commentairesFormatted[] = [
                    'id' => $commentaire->id,
                    'user_name' => $utilisateur->prenom ?? 'Utilisateur',
                    'user_id' => $commentaire->utilisateur_id,
                    'commentaire' => $commentaire->commentaire,
                    'note' => $commentaire->note,
                    'date' => $commentaire->date->format('d/m/Y H:i')
                ];
            }

            return response()->json([
                'success' => true,
                'commentaires' => $commentairesFormatted
            ]);
        }
        
        return response()->json([
            'success' => true,
            'commentaires' => []
        ]);
    }

    /**
     * Marquer un commentaire comme inapproprié
     */
    public function signaler(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);
        
        if (!$commentaire) {
            return response()->json([
                'success' => false,
                'message' => 'Commentaire non trouvé.'
            ], 404);
        }

        $request->validate([
            'raison' => 'required|string|max:500'
        ]);

        // Mettre à jour le statut du commentaire
        $commentaire->update([
            'statut' => 'signalé',
            'raison_signalement' => $request->raison
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Commentaire signalé. Les modérateurs vont l\'examiner.'
        ]);
    }
}