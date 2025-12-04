<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';
    protected $primaryKey = 'id_commentaire';
    public $timestamps = false;

    protected $casts = [
        'note' => 'int',
        'date' => 'datetime',
    ];

    protected $fillable = [
        'texte',
        'note',
        'date',
        'user_id',
        'contenu_id'
    ];

    // Relation avec le contenu
    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'contenu_id');
    }

    // Relation avec l'utilisateur (auteur du commentaire)
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id');
    }

    // Alias pour utilisateur (si vous préférez user)
    public function user()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id');
    }
}