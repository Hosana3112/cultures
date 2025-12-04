<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    use HasFactory;

    protected $table = 'contenus';
    
    protected $casts = [
        'date_creation' => 'datetime',
        'date_validation' => 'datetime',
        'date' => 'datetime',
    ];

    protected $fillable = [
        'titre',
        'texte',
        'date_creation',
        'statut',
        'parend_id',
        'date_validation',
        'type_contenu_id',
        'auteur_id',
        'region_id',
        'moderateur_id'
    ];

    // Relation avec l'auteur (utilisateur)
    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    // Alias pour auteur (si besoin)
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    // Relation avec le type de contenu
    public function typeContenue()
    {
        return $this->belongsTo(TypeContenue::class, 'type_contenu_id');
    }

    // Relation avec les commentaires
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'contenu_id');
    }

    // Relation avec les médias
    public function media()
    {
        return $this->hasMany(Media::class, 'contenu_id');
    }

    // Relation avec la région
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    // Relation avec le modérateur
    public function moderateur()
    {
        return $this->belongsTo(Utilisateur::class, 'moderateur_id');
    }

    // Relation parent (si nécessaire)
    public function parent()
    {
        return $this->belongsTo(Contenu::class, 'parend_id');
    }

    // Relation enfants (si nécessaire)
    public function enfants()
    {
        return $this->hasMany(Contenu::class, 'parend_id');
    }
}