<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hojaderutum
 * 
 * @property int $idHojaDeRuta
 * @property int $idRutas
 * 
 * @property Ruta $ruta
 * @property HojaderutaCamioneroscoch $hojaderuta_camioneroscoch
 * @property Collection|HojaderutaMovimieto[] $hojaderuta_movimietos
 *
 * @package App\Models
 */
class Hojaderutum extends Model
{
	protected $table = 'hojaderuta';
	protected $primaryKey = 'idHojaDeRuta';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'idHojaDeRuta' => 'int',
		'idRutas' => 'int'
	];

	protected $fillable = [
		'idRutas'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'idRutas');
	}

	public function hojaderuta_camioneroscoch()
	{
		return $this->hasOne(HojaderutaCamioneroscoch::class, 'idHojaDeRuta');
	}

	public function hojaderuta_movimietos()
	{
		return $this->hasMany(HojaderutaMovimieto::class, 'idHojaDeRuta');
	}

}
