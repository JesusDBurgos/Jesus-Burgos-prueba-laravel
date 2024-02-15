<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersCliente
 * 
 * @property int $id
 * @property int|null $telefono
 * @property string|null $nombre
 * @property int $genero
 * @property Carbon|null $nacimiento
 * @property string|null $identificacion
 * @property int|null $id_direccion
 * @property int $id_user
 * 
 * @property User $user
 * @property UsersDireccione|null $users_direccione
 *
 * @package App\Models
 */
class UsersCliente extends Model
{
	protected $table = 'users_clientes';
	public $timestamps = false;

	protected $casts = [
		'telefono' => 'int',
		'genero' => 'int',
		'nacimiento' => 'datetime',
		'id_direccion' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'telefono',
		'nombre',
		'genero',
		'nacimiento',
		'identificacion',
		'id_direccion',
		'id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function users_direccione()
	{
		return $this->belongsTo(UsersDireccione::class, 'id_direccion');
	}
}
