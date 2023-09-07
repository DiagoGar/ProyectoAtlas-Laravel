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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idLotes' => 'int',
		'idRemitos' => 'int',
		'cedulaFuncionario' => 'int',
		'cantidadProductos' => 'int'
	];

	protected $fillable = [
		'idRemitos',
		'cedulaFuncionario',
		'cantidadProductos'
	];

	public function tipofuncionario()
	{
		return $this->belongsTo(Tipofuncionario::class, 'cedulaFuncionario');
	}

	public function remito()
	{
		return $this->belongsTo(Remito::class, 'idRemitos');
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
}
