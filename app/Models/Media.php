<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Media
 * 
 * @property int $id
 * @property string $chemin
 * @property string $nom_original
 * @property string|null $mime_type
 * @property int|null $taille
 * @property string|null $description
 * @property int $type_media_id
 * @property int $contenu_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Contenu $contenu
 * @property TypeMedia $type_media
 *
 * @package App\Models
 */
class Media extends Model
{
    protected $table = 'medias';

    protected $casts = [
        'type_media_id' => 'int',
        'contenu_id' => 'int',
        'taille' => 'int'
    ];

    protected $fillable = [
        'chemin',
        'nom_original',
        'mime_type',
        'taille',
        'description',
        'type_media_id',
        'contenu_id'
    ];

    public function getUrlAttribute()
    {
        return Storage::url($this->chemin);
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }

    public function type_media()
    {
        return $this->belongsTo(TypeMedia::class);
    }
}