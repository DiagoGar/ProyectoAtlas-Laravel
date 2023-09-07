<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Coch
 * 
 * @property string $patente
 * @property string $tipoCoche
 * 
 * @property Collection|CamionerosCoch[] $camioneros_coches
 *
 * @package App\Models
 */
class Coch extends Model
{
	protected $table = 'coches';
	protected $primaryKey = 'patente';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'tipoCoche'
	];

	public function camioneros_coches()
	{
		return $this->hasMany(CamionerosCoch::class, 'patente');
	}
}
