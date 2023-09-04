<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * 
 * @property int $id
 * @property string $nombre
 * @property string $rut
 * @property int $direccionAlmacen
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Almacen extends Model
{
	protected $table = 'almacen';

	protected $casts = [
		'direccionAlmacen' => 'int'
	];

	protected $fillable = [
		'nombre',
		'rut',
		'direccionAlmacen'
	];
}
