<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';
    
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'sexe',
        'date_naissance',
        'statut',
        'photo_chemin',
        'photo_nom_original',
        'photo_mime_type',
        'photo_taille',
        'photo_description',
        'langue_id',
        'role_id'
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $casts = [
        'date_inscription' => 'datetime',
        'date_naissance' => 'date',
        'mot_de_passe' => 'hashed',
    ];

    // Relations
    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Accessors
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo_chemin) {
            return null;
        }
        return Storage::url($this->photo_chemin);
    }

    public function getAgeAttribute()
    {
        return $this->date_naissance ? $this->date_naissance->age : null;
    }

    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }
}