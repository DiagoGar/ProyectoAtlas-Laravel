<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Remito
 * 
 * @property int $idRemitos
 * @property string|null $remitente
 * @property string $destinatario
 * @property Carbon $fechaEmision
 * 
 * @property Collection|Lote[] $lotes
 * @property RemitosProductosalmacen $remitos_productosalmacen
 *
 * @package App\Models
 */
class Remito extends Model
{
	protected $table = 'remitos';
	protected $primaryKey = 'idRemitos';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'idRemitos' => 'int',
		'fechaEmision' => 'datetime'
	];

	protected $fillable = [
		'remitente',
		'destinatario',
		'fechaEmision',
		'destino'
	];

	public function lotes()
	{
		return $this->hasMany(Lote::class, 'idRemitos');
	}

	public function remitos_productosalmacen()
	{
		return $this->hasOne(RemitosProductosalmacen::class, 'idRemitos');
	}
	
}
