<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Langue
 * 
 * @property int $id
 * @property string $nom
 * @property string $code_langue
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Parler[] $parlers
 * @property Collection|Utilisateur[] $utilisateurs
 *
 * @package App\Models
 */
class Langue extends Model
{
	protected $table = 'langues';

	protected $fillable = [
		'nom',
		'code_langue',
		'description'
	];

	public function parlers()
	{
		return $this->hasMany(Parler::class);
	}

	public function utilisateurs()
	{
		return $this->hasMany(Utilisateur::class);
	}
}
