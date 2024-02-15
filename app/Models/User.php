<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property int $estado
 * @property int $tipo
 * @property int $login
 * @property int|null $telefono
 * @property int|null $codigo_temporal
 * @property string|null $correo
 * @property string|null $password
 * 
 * @property Collection|Carrito[] $carritos
 * @property Collection|Pedido[] $pedidos
 * @property UsersCliente $users_cliente
 * @property Collection|UsersDireccione[] $users_direcciones
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'tipo' => 'int',
		'login' => 'int',
		'telefono' => 'int',
		'codigo_temporal' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'estado',
		'tipo',
		'login',
		'telefono',
		'codigo_temporal',
		'correo',
		'password'
	];

	public function carritos()
	{
		return $this->hasMany(Carrito::class, 'id_user');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_user');
	}

	public function users_cliente()
	{
		return $this->hasOne(UsersCliente::class, 'id_user');
	}

	public function users_direcciones()
	{
		return $this->hasMany(UsersDireccione::class, 'id_user');
	}
}
