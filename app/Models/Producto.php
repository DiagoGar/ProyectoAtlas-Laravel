<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $idProductos
 * @property string|null $nombreProducto
 * @property int|null $pesoProducto
 * 
 * @property Collection|Almacen[] $almacens
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'idProductos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idProductos' => 'int',
		'pesoProducto' => 'int'
	];

	protected $fillable = [
		'nombreProducto',
		'pesoProducto'
	];

	public function almacens()
	{
		return $this->belongsToMany(Almacen::class, 'productos_almacen', 'idProductos', 'idAlmacen');
	}

	public function jsonSerialize(): mixed
	{
		return [
			'idProductos' => $this->idProductos,
			'nobreProducto' => $this->nombreProducto,
			'pesoProducto' => $this->pesoProducto,
			'almacenes' => $this->almacens()
		];
	}
}
