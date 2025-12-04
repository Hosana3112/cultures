<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeMedia
 * 
 * @property int $id
 * @property string $nom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Media[] $media
 *
 * @package App\Models
 */
class TypeMedia extends Model
{
	protected $table = 'type_medias';

	protected $fillable = [
		'nom'
	];

	public function media()
	{
		return $this->hasMany(Media::class);
	}
}
