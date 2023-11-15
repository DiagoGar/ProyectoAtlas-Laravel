<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HojaderutaCamioneroscoch
 * 
 * @property int $idHojaDeRuta
 * @property string|null $patente
 * @property int|null $cedulaCamionero
 * @property Carbon|null $fechaArranque
 * 
 * @property CamionerosCoch|null $camioneros_coch
 * @property Hojaderutum $hojaderutum
 *
 * @package App\Models
 */
class HojaderutaCamioneroscoch extends Model
{
	protected $table = 'hojaderuta_camioneroscoches';
	protected $primaryKey = 'idHojaDeRuta';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idHojaDeRuta' => 'int',
		'cedulaCamionero' => 'int',
		'fechaArranque' => 'datetime'
	];

	protected $fillable = [
		'patente',
		'cedulaCamionero',
		'fechaArranque'
	];

	public static function __set_state($state)
    {
        $model = new self;

        // Asignar las propiedades del estado al modelo
        foreach ($state as $property => $value) {
            $model->$property = $value;
        }

        return $model;
    }

	public function camioneros_coch()
	{
		return $this->belongsTo(CamionerosCoch::class, 'patente', 'patente');
	}

	public function hojaderutum()
	{
		return $this->belongsTo(Hojaderutum::class, 'idHojaDeRuta');
	}
	
}
