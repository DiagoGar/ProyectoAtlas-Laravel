<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CamionerosCoch
 * 
 * @property int $cedulaCamionero
 * @property string $patente
 * 
 * @property Tipocamionero $tipocamionero
 * @property Coch $coch
 * @property Collection|HojaderutaCamioneroscoch[] $hojaderuta_camioneroscoches
 *
 * @package App\Models
 */
class CamionerosCoch extends Model
{
	protected $table = 'camioneros_coches';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cedulaCamionero' => 'int'
	];

	public function tipocamionero()
	{
		return $this->belongsTo(Tipocamionero::class, 'cedulaCamionero');
	}

	public function coch()
	{
		return $this->belongsTo(Coch::class, 'patente');
	}

	public function hojaderuta_camioneroscoches()
	{
		return $this->hasMany(HojaderutaCamioneroscoch::class, 'patente', 'patente');
	}

	public function jsonSerialize(): mixed
	{
		return [
			'cedulaCamionero' => $this->tipocamionero(),
			'hojaDeRutaCamioneroCoche' => $this->hojaderuta_camioneroscoches()
		];
	}
}
