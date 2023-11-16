<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lote
 * 
 * @property int $idLotes
 * @property int $idRemitos
 * @property int $cedulaFuncionario
 * @property int $cantidadProductos
 * 
 * @property Tipofuncionario $tipofuncionario
 * @property Remito $remito
 * @property Collection|LoteRemitosproductosalmacen[] $lote_remitosproductosalmacens
 * @property Collection|Movimiento[] $movimientos
 *
 * @package App\Models
 */
class Lote extends Model
{
	protected $table = 'lotes';
	protected $primaryKey = 'idLotes';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'idLotes' => 'int',
		'cedulaFuncionario' => 'int',
		'cantidadProductos' => 'int'
	];

	protected $fillable = [
		'cedulaFuncionario',
		'cantidadProductos'
	];

	public function tipofuncionario()
	{
		return $this->belongsTo(Tipofuncionario::class, 'cedulaFuncionario');
	}

	public function lote_remitosproductosalmacens()
	{
		return $this->hasMany(LoteRemitosproductosalmacen::class, 'idLotes');
	}

	public function movimientos()
	{
		return $this->belongsToMany(Movimiento::class, 'lotes_movimientos', 'idLotes', 'idMovimientos')
					->withPivot('estado', 'fechaLlegada');
	}

	// public function jsonSerialize(): mixed
	// {
	// 	return [
	// 		'idLotes' => $this->idLotes,
	// 		'cedulaFuncionario' => $this->tipofuncionario(),
	// 		'cantidad' => $this->cantidadProductos,
	// 		'lote_rpa' => $this->lote_remitosproductosalmacens(),
	// 		'movimientos' => $this->movimientos()
	// 	];
	// }
}
