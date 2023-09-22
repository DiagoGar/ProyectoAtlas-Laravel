<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HojaderutaMovimieto
 * 
 * @property int $idMovimientos
 * @property int|null $idHojaDeRuta
 * 
 * @property Hojaderutum|null $hojaderutum
 * @property Movimiento $movimiento
 *
 * @package App\Models
 */
class HojaderutaMovimieto extends Model
{
	protected $table = 'hojaderuta_movimietos';
	protected $primaryKey = 'idMovimientos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMovimientos' => 'int',
		'idHojaDeRuta' => 'int'
	];

	protected $fillable = [
		'idHojaDeRuta'
	];

	public function hojaderutum()
	{
		return $this->belongsTo(Hojaderutum::class, 'idHojaDeRuta');
	}

	public function movimiento()
	{
		return $this->belongsTo(Movimiento::class, 'idMovimientos');
	}

	public function jsonSerialize(): mixed
	{
		return [
			'idMovimientos' => $this->movimiento(),
			'idHojaDeRuta' => $this->hojaderutum()
		];
	}
}
