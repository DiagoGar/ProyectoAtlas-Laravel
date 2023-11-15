<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nododireccion
 * 
 * @property int $idNodos
 * @property string $calle
 * @property int $numeroPuerta
 * @property string $ciudad
 * @property string $rutaAcceso
 * 
 * @property Nodo $nodo
 *
 * @package App\Models
 */
class Nododireccion extends Model
{
	protected $table = 'nododireccion';
	protected $primaryKey = 'idNodos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idNodos' => 'int',
		'numeroPuerta' => 'int'
	];

	protected $fillable = [
		'calle',
		'numeroPuerta',
		'ciudad',
		'rutaAcceso'
	];

	public function nodo()
	{
		return $this->belongsTo(Nodo::class, 'idNodos');
	}

}
