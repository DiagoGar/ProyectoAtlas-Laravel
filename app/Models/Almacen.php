<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * 
 * @property int $idAlmacen
 * @property int|null $rut
 * @property string|null $nombre
 * 
 * @property Collection|Almacendireccion[] $almacendireccions
 * @property Almacendireccion $almacendireccion
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Almacen extends Model
{
	protected $table = 'almacen';
	protected $primaryKey = 'idAlmacen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAlmacen' => 'int',
		'rut' => 'int'
	];

	protected $fillable = [
		'rut',
		'nombre'
	];

	public function almacendireccions()
	{
		return $this->hasMany(Almacendireccion::class, 'direccionAlmacen', 'direccionAlmacen');
	}

	public function almacendireccion()
	{
		return $this->hasOne(Almacendireccion::class, 'idAlmacen');
	}

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'productos_almacen', 'idAlmacen', 'idProductos');
	}

	public function jsonSerialize(): mixed
	{
		return [
			'idAlmacen' => $this->idAlmacen,
			'direccion' => $this->almacendireccion(),
			'rut' => $this->rut,
			'nombre' => $this->nombre,
			'nodos' => $this->almacendireccions(),
			'productos' => $this->productos()
		];
	}
}
