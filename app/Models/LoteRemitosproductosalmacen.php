<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoteRemitosproductosalmacen
 * 
 * @property int $idRemitos
 * @property int|null $idLotes
 * 
 * @property Lote|null $lote
 * @property RemitosProductosalmacen $remitos_productosalmacen
 *
 * @package App\Models
 */
class LoteRemitosproductosalmacen extends Model
{
	protected $table = 'lote_remitosproductosalmacen';
	protected $primaryKey = 'idRemitos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idRemitos' => 'int',
		'idLotes' => 'int'
	];

	protected $fillable = [
		'idLotes'
	];

	public function lote()
	{
		return $this->belongsTo(Lote::class, 'idLotes');
	}

	public function remitos_productosalmacen()
	{
		return $this->belongsTo(RemitosProductosalmacen::class, 'idRemitos');
	}

	// public function jsonSerialize(): mixed
	// {
	// 	return [
	// 		'idlote' => $this->lote(),
	// 		'rpa' => $this->remitos_productosalmacen(),
	// 	];
	// }
}
