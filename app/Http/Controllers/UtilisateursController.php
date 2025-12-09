<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Langue;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UtilisateursController extends Controller
{
    /**
     * Afficher la liste des utilisateurs
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with(['langue', 'role'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $langues = Langue::all();
        $roles = Role::all();
        
        return view('utilisateurs.create', compact('langues', 'roles'));
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => ['required', 'confirmed', Rules\Password::defaults()],
            'sexe' => 'required|in:homme,femme,autre',
            'date_naissance' => 'required|date',
            'statut' => 'required|in:actif,inactif,suspendu',
            'langue_id' => 'required|exists:langues,id',
            'role_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|max:2048', // 2MB max
        ]);

        // Gestion de l'upload de photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('utilisateurs/photos', 'public');
            
            $validated['photo_chemin'] = $photoPath;
            $validated['photo_nom_original'] = $photo->getClientOriginalName();
            $validated['photo_mime_type'] = $photo->getClientMimeType();
            $validated['photo_taille'] = $photo->getSize();
        }

        // Création de l'utilisateur
        Utilisateur::create($validated);

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Afficher les détails d'un utilisateur
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load(['langue', 'role']);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Utilisateur $utilisateur)
    {
        $langues = Langue::all();
        $roles = Role::all();
        
        return view('utilisateurs.edit', compact('utilisateur', 'langues', 'roles'));
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'sexe' => 'required|in:homme,femme,autre',
            'date_naissance' => 'required|date',
            'statut' => 'required|in:actif,inactif,suspendu',
            'langue_id' => 'required|exists:langues,id',
            'role_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|max:2048',
            'nouveau_mot_de_passe' => 'nullable|confirmed|min:8',
        ]);

        // Gestion du mot de passe
        if ($request->filled('nouveau_mot_de_passe')) {
            $validated['mot_de_passe'] = Hash::make($request->nouveau_mot_de_passe);
        }

        // Gestion de l'upload de photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($utilisateur->photo_chemin) {
                Storage::disk('public')->delete($utilisateur->photo_chemin);
            }

            $photo = $request->file('photo');
            $photoPath = $photo->store('utilisateurs/photos', 'public');
            
            $validated['photo_chemin'] = $photoPath;
            $validated['photo_nom_original'] = $photo->getClientOriginalName();
            $validated['photo_mime_type'] = $photo->getClientMimeType();
            $validated['photo_taille'] = $photo->getSize();
        }

        $utilisateur->update($validated);

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprimer un utilisateur
     */
    public function destroy(Utilisateur $utilisateur)
    {
        // Supprimer la photo si elle existe
        if ($utilisateur->photo_chemin) {
            Storage::disk('public')->delete($utilisateur->photo_chemin);
        }

        $utilisateur->delete();

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}