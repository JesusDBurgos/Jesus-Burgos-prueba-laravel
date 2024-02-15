<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 * 
 * @property int $id
 * @property float $cantidad
 * @property int $id_producto
 * @property int $id_tienda
 * @property int $id_user
 * @property Carbon $created_at
 * 
 * @property User $user
 * @property Producto $producto
 * @property Tienda $tienda
 *
 * @package App\Models
 */
class Carrito extends Model
{
	protected $table = 'carritos';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'float',
		'id_producto' => 'int',
		'id_tienda' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'cantidad',
		'id_producto',
		'id_tienda',
		'id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
	}
}
