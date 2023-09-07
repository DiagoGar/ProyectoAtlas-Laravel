<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $cedulaUsuario
 * @property string $tipoUsuario
 * @property string $nombreUsuario
 * @property int|null $telefono
 * @property string $mail
 * @property string $password
 * 
 * @property Tipocamionero $tipocamionero
 * @property Tipofuncionario $tipofuncionario
 *
 * @package App\Models
 */
class Usuario extends Authenticatable implements JWTSubject
{

	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'usuarios';
	protected $primaryKey = 'cedulaUsuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cedulaUsuario' => 'int',
		'telefono' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'tipoUsuario',
		'nombreUsuario',
		'telefono',
		'mail',
		'password'
	];

	public function tipocamionero()
	{
		return $this->hasOne(Tipocamionero::class, 'cedulaCamionero');
	}

	public function tipofuncionario()
	{
		return $this->hasOne(Tipofuncionario::class, 'cedulaFuncionario');
	}

	public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [];
  }
}
