<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocamionero
 * 
 * @property int $cedulaCamionero
 * @property string $libreta
 * 
 * @property Usuario $usuario
 * @property Collection|CamionerosCoch[] $camioneros_coches
 *
 * @package App\Models
 */
class Tipocamionero extends Model
{
	protected $table = 'tipocamionero';
	protected $primaryKey = 'cedulaCamionero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cedulaCamionero' => 'int'
	];

	protected $fillable = [
		'libreta'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'cedulaCamionero');
	}

	public function camioneros_coches()
	{
		return $this->hasMany(CamionerosCoch::class, 'cedulaCamionero');
	}
}
