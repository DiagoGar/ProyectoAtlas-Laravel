<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacendireccion
 * 
 * @property int $idAlmacen
 * @property string $calle
 * @property int $numeroPuerta
 * @property string $ciudad
 * @property string $rutaAcceso
 * 
 * @property Almacen $almacen
 *
 * @package App\Models
 */
class Almacendireccion extends Model
{
	protected $table = 'almacendireccion';
	protected $primaryKey = 'idAlmacen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAlmacen' => 'int',
		'numeroPuerta' => 'int'
	];

	protected $fillable = [
		'calle',
		'numeroPuerta',
		'ciudad',
		'rutaAcceso'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacen::class, 'idAlmacen');
	}
}
