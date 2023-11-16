<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipofuncionario
 * 
 * @property int $cedulaFuncionario
 * @property string $cargo
 * 
 * @property Usuario $usuario
 * @property Collection|Lote[] $lotes
 *
 * @package App\Models
 */
class Tipofuncionario extends Model
{
	protected $table = 'tipofuncionario';
	protected $primaryKey = 'cedulaFuncionario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cedulaFuncionario' => 'int'
	];

	protected $fillable = [
		'cargo'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'cedulaFuncionario');
	}

	public function lotes()
	{
		return $this->hasMany(Lote::class, 'cedulaFuncionario');
	}

	// public function jsonSerialize(): mixed
	// {
	// 	return [
	// 		'cedulaFuncionario' => $this->usuario(),
	// 		'cargo' => $this->cargo,
	// 		'lotes' => $this->lotes(),
	// 	];
	// }
}
