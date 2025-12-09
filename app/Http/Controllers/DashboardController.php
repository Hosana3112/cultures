<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Utilisateur;
use App\Models\Commentaire;
use App\Models\Media;
use App\Models\TypeContenue;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 3) { // 3 = Utilisateur
            return redirect()->route('front.accueil');
        }
        
        // Rediriger les modérateurs vers l'index des contenus
        if ($user->role_id == 2) { // 2 = Modérateur
            return redirect()->route('admin.contenus.index');
        }

        // Statistiques principales
        $stats = [
            'total_contenus' => Contenu::count(),
            'total_utilisateurs' => Utilisateur::count(),
            'total_commentaires' => Commentaire::count(),
            'total_medias' => Media::count(),
        ];

        // Contenus par type - Requête directe
        $typesContenus = TypeContenue::all();
        $stats['contenus_par_type'] = [];
        $stats['types_contenus'] = [];
        
        foreach ($typesContenus as $type) {
            $count = Contenu::where('type_contenu_id', $type->id)->count();
            $stats['contenus_par_type'][] = $count;
            $stats['types_contenus'][] = $type->nom;
        }

        // Contenus par région - Requête directe
        $regions = Region::all();
        $stats['contenus_par_region'] = [];
        $stats['regions'] = [];
        
        foreach ($regions as $region) {
            $count = Contenu::where('region_id', $region->id)->count();
            $stats['contenus_par_region'][] = $count;
            $stats['regions'][] = $region->nom_region;
        }

        // Commentaires récents
        $recent_comments = Commentaire::with('utilisateur')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        // Préparer les données pour l'avatar de l'utilisateur connecté
        $userAvatarData = $this->getUserAvatarData($user);

        return view('dashboard', compact('stats', 'recent_comments', 'userAvatarData'));
    }

    /**
     * Préparer les données pour l'avatar de l'utilisateur
     */
    private function getUserAvatarData($user)
    {
        $sexe = strtolower($user->sexe ?? '');
        
        // Déterminer la classe CSS et l'initiale selon le sexe
        if ($sexe === 'homme') {
            $avatarClass = 'male';
            $avatarInitial = 'H';
        } elseif ($sexe === 'femme') {
            $avatarClass = 'female';
            $avatarInitial = 'F';
        } else {
            $avatarClass = 'neutral';
            $avatarInitial = 'U';
        }

        // Vérifier si l'utilisateur a une photo
        $hasPhoto = false;
        $photoUrl = null;
        
        if ($user->photo) {
            // Vérifier si le fichier existe dans le storage
            $photoPath = storage_path('app/public/' . $user->photo);
            if (file_exists($photoPath)) {
                $hasPhoto = true;
                $photoUrl = asset('storage/' . $user->photo);
            }
        }

        return [
            'hasPhoto' => $hasPhoto,
            'photoUrl' => $photoUrl,
            'avatarClass' => $avatarClass,
            'avatarInitial' => $avatarInitial,
            'userName' => ($user->prenom ?? 'Utilisateur') . ' ' . ($user->nom ?? ''),
            'userRole' => $user->role->nom ?? 'Administrateur'
        ];
    }
}