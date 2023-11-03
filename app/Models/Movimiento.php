<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 * 
 * @property int $idMovimientos
 * @property int|null $idNodos
 * @property int|null $idRutas
 * @property string $estado
 * @property Carbon|null $fechaEstimada
 * @property Carbon $fechaLlegada
 * 
 * @property Ruta|null $ruta
 * @property Nodo|null $nodo
 * @property HojaderutaMovimieto $hojaderuta_movimieto
 * @property Collection|Lote[] $lotes
 *
 * @package App\Models
 */
class Movimiento extends Model
{
	protected $table = 'movimientos';
	protected $primaryKey = 'idMovimientos';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'idMovimientos' => 'int',
		'idNodos' => 'int',
		'idRutas' => 'int',
		'idHojaDeRuta' => 'int',
		'fechaEstimada' => 'datetime',
		'fechaLlegada' => 'datetime'
	];

	protected $fillable = [
		'idNodos',
		'idRutas',
		'idHojaDeRuta',
		'estado',
		'fechaEstimada',
		'fechaLlegada'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'idRutas');
	}

	public function nodo()
	{
		return $this->belongsTo(Nodo::class, 'idNodos');
	}

	public function hojaderuta()
	{
		return $this->belongsTo(Hojaderutum::class, 'idHojaDeRuta');
	}

	public function lotes()
	{
		return $this->belongsToMany(Lote::class, 'lotes_movimientos', 'idMovimientos', 'idLotes')
					->withPivot('estado', 'fechaLlegada');
	}

	// public function jsonSerialize(): mixed
	// {
	// 	return [
	// 		'idMovimientos' => $this->idMovimientos,
	// 		'idNodo' => $this->nodo(),
	// 		'idRuta' => $this->ruta(),
	// 		'estado' => $this->estado,
	// 		'fechaLlegada' => $this->fechaLlegada,
	// 		'fechaEstimada' => $this->fechaEstimada,
	// 		'lotes' => $this->lotes()
	// 	];
	// }
}
