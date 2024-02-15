<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersDireccione
 * 
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property int $distancia
 * @property int $id_user
 * 
 * @property User $user
 * @property Collection|UsersCliente[] $users_clientes
 *
 * @package App\Models
 */
class UsersDireccione extends Model
{
	protected $table = 'users_direcciones';
	public $timestamps = false;

	protected $casts = [
		'distancia' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'nombre',
		'direccion',
		'distancia',
		'id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function users_clientes()
	{
		return $this->hasMany(UsersCliente::class, 'id_direccion');
	}
}
