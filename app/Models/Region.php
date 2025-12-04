<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $nom_region
 * @property string|null $description
 * @property int|null $population
 * @property float|null $superficie
 * @property string|null $localisation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Parler[] $parlers
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regions';

	protected $casts = [
		'population' => 'int',
		'superficie' => 'float'
	];

	protected $fillable = [
		'nom_region',
		'description',
		'population',
		'superficie',
		'localisation'
	];

	public function parlers()
	{
		return $this->hasMany(Parler::class);
	}
}
