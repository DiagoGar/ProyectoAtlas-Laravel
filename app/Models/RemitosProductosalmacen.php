<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RemitosProductosalmacen
 * 
 * @property int $idRemitos
 * @property int|null $idProductos
 * @property int $rut
 * 
 * @property Remito $remito
 * @property ProductosAlmacen|null $productos_almacen
 * @property LoteRemitosproductosalmacen $lote_remitosproductosalmacen
 *
 * @package App\Models
 */
class RemitosProductosalmacen extends Model
{
	protected $table = 'remitos_productosalmacen';
	protected $primaryKey = 'idRemitos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idRemitos' => 'int',
		'idProductos' => 'int',
		'rut' => 'int'
	];

	protected $fillable = [
		'idProductos',
		'rut'
	];

	public function remito()
	{
		return $this->belongsTo(Remito::class, 'idRemitos');
	}

	public function productos_almacen()
	{
		return $this->belongsTo(ProductosAlmacen::class, 'idProductos');
	}

	public function lote_remitosproductosalmacen()
	{
		return $this->hasOne(LoteRemitosproductosalmacen::class, 'idRemitos');
	}

}
