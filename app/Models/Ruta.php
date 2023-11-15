<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 * 
 * @property int $idRutas
 * @property string $nombreRuta
 * 
 * @property Collection|Hojaderutum[] $hojaderuta
 * @property Collection|Movimiento[] $movimientos
 * @property Collection|Nodo[] $nodos
 *
 * @package App\Models
 */
class Ruta extends Model
{
	protected $table = 'rutas';
	protected $primaryKey = 'idRutas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idRutas' => 'int'
	];

	protected $fillable = [
		'nombreRuta'
	];

	public function hojaderuta()
	{
		return $this->hasMany(Hojaderutum::class, 'idRutas');
	}

	public function movimientos()
	{
		return $this->hasMany(Movimiento::class, 'idRutas');
	}

	public function nodos()
	{
		return $this->hasMany(Nodo::class, 'idRutas');
	}

}
