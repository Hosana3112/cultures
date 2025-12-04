<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parler
 * 
 * @property int $langue_id
 * @property int $region_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Langue $langue
 * @property Region $region
 *
 * @package App\Models
 */
class Parler extends Model
{
	protected $table = 'parler';
	public $incrementing = false;

	protected $casts = [
		'langue_id' => 'int',
		'region_id' => 'int'
	];

	public function langue()
	{
		return $this->belongsTo(Langue::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}
}
