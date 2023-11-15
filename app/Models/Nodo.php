<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nodo
 * 
 * @property int $idNodos
 * @property int|null $idRutas
 * @property string|null $nombreNodo
 * @property bool $esFinal
 * 
 * @property Ruta|null $ruta
 * @property Collection|Movimiento[] $movimientos
 * @property Nododireccion $nododireccion
 *
 * @package App\Models
 */
class Nodo extends Model
{
	protected $table = 'nodos';
	protected $primaryKey = 'idNodos';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'idNodos' => 'int',
		'idRutas' => 'int',
		'esFinal' => 'bool'
	];

	protected $fillable = [
		'idRutas',
		'nombreNodo',
		'esFinal'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'idRutas');
	}

	public function movimientos()
	{
		return $this->hasMany(Movimiento::class, 'idNodos');
	}

	public function nododireccion()
	{
		return $this->hasOne(Nododireccion::class, 'idNodos');
	}

}
