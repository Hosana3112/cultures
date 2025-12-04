<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use App\Models\Langue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $langues = Langue::all();
        return view('auth.register', compact('langues'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:utilisateurs,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sexe' => ['required', 'in:M,F'],
            'date_naissance' => ['required', 'date', 'before:-18 years'],
            'langue_id' => ['required', 'exists:langues,id'],
            'photo_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'photo_description' => ['nullable', 'string', 'max:255'],
        ], [
            'date_naissance.before' => 'Vous devez avoir au moins 18 ans pour vous inscrire.',
            'langue_id.required' => 'Veuillez sélectionner votre langue préférée.',
            'photo_file.image' => 'Le fichier doit être une image.',
            'photo_file.mimes' => 'Les formats acceptés sont: JPEG, PNG, JPG, WEBP.',
            'photo_file.max' => 'La taille maximale de l\'image est de 2MB.',
        ]);

        // Préparer les données de l'utilisateur
        $userData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'date_inscription' => now(),
            'statut' => 'Actif',
            'langue_id' => $request->langue_id,
            'role_id' => 3, // Rôle Utilisateur par défaut
        ];

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo_file')) {
            $photoFile = $request->file('photo_file');
            
            // Générer un nom unique
            $fileName = 'user_' . time() . '_' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
            
            // Stocker le fichier
            $path = $photoFile->storeAs('photos/utilisateurs', $fileName, 'public');
            
            // Ajouter les métadonnées de la photo
            $userData['photo_chemin'] = $path;
            $userData['photo_nom_original'] = $photoFile->getClientOriginalName();
            $userData['photo_mime_type'] = $photoFile->getMimeType();
            $userData['photo_taille'] = $photoFile->getSize();
            $userData['photo_description'] = $request->photo_description;
        }

        $utilisateur = Utilisateur::create($userData);

        event(new Registered($utilisateur));

        Auth::login($utilisateur);

        return redirect(route('dashboard', absolute: false))
            ->with('success', 'Inscription réussie ! Bienvenue ' . $utilisateur->prenom . ' !');
    }
}