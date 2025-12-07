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
        'role_id',
        'google2fa_secret',
        'google2fa_enabled',
        'backup_codes',
        'two_factor_confirmed_at'
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $casts = [
        'date_inscription' => 'datetime',
        'date_naissance' => 'date',
        'mot_de_passe' => 'hashed',
        'google2fa_enabled' => 'boolean',
        'two_factor_confirmed_at' => 'datetime',
        'backup_codes' => 'array'
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

     // Générer des codes de secours
    public function generateBackupCodes()
    {
        $codes = [];
        for ($i = 0; $i < 10; $i++) {
            $codes[] = strtoupper(bin2hex(random_bytes(5)));
        }
        
        $this->backup_codes = $codes;
        $this->save();
        
        return $codes;
    }

    // Utiliser un code de secours
    public function useBackupCode($code)
    {
        $codes = $this->backup_codes ?? [];
        
        $index = array_search($code, $codes);
        
        if ($index !== false) {
            unset($codes[$index]);
            $this->backup_codes = array_values($codes);
            $this->save();
            return true;
        }
        
        return false;
    }
}