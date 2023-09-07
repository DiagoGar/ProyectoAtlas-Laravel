<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LotesMovimiento
 * 
 * @property int $idMovimientos
 * @property int $idLotes
 * @property string|null $estado
 * @property Carbon|null $fechaLlegada
 * 
 * @property Lote $lote
 * @property Movimiento $movimiento
 *
 * @package App\Models
 */
class LotesMovimiento extends Model
{
	protected $table = 'lotes_movimientos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMovimientos' => 'int',
		'idLotes' => 'int',
		'fechaLlegada' => 'datetime'
	];

	protected $fillable = [
		'estado',
		'fechaLlegada'
	];

	public function lote()
	{
		return $this->belongsTo(Lote::class, 'idLotes');
	}

	public function movimiento()
	{
		return $this->belongsTo(Movimiento::class, 'idMovimientos');
	}
}
