<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosAlmacen
 * 
 * @property int $idProductos
 * @property int|null $idAlmacen
 * 
 * @property Almacen|null $almacen
 * @property Producto $producto
 * @property Collection|RemitosProductosalmacen[] $remitos_productosalmacens
 *
 * @package App\Models
 */
class ProductosAlmacen extends Model
{
	protected $table = 'productos_almacen';
	protected $primaryKey = 'idProductos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idProductos' => 'int',
		'idAlmacen' => 'int'
	];

	protected $fillable = [
		'idAlmacen'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacen::class, 'idAlmacen');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProductos');
	}

	public function remitos_productosalmacens()
	{
		return $this->hasMany(RemitosProductosalmacen::class, 'idProductos');
	}

	public function jsonSerialize(): mixed
	{
		return [
			'idProductos' => $this->producto(),
			'idAlmacen' => $this->almacen()
		];
	}
}
