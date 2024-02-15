<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id
 * @property string|null $instrucciones
 * @property Carbon $entrega_fecha
 * @property float $valor_productos
 * @property float $valor_envio
 * @property float $valor_descuento
 * @property float $valor_cupon
 * @property int $impuestos
 * @property float $valor_impuestos
 * @property float $valor_final
 * @property float|null $calificacion
 * @property int $id_tienda
 * @property string|null $direccion
 * @property float $valor_comision
 * @property int|null $id_user
 * @property Carbon $created_at
 * 
 * @property User|null $user
 * @property Tienda $tienda
 * @property Collection|PedidosEstado[] $pedidos_estados
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedidos';
	public $timestamps = false;

	protected $casts = [
		'entrega_fecha' => 'datetime',
		'valor_productos' => 'float',
		'valor_envio' => 'float',
		'valor_descuento' => 'float',
		'valor_cupon' => 'float',
		'impuestos' => 'int',
		'valor_impuestos' => 'float',
		'valor_final' => 'float',
		'calificacion' => 'float',
		'id_tienda' => 'int',
		'valor_comision' => 'float',
		'id_user' => 'int'
	];

	protected $fillable = [
		'instrucciones',
		'entrega_fecha',
		'valor_productos',
		'valor_envio',
		'valor_descuento',
		'valor_cupon',
		'impuestos',
		'valor_impuestos',
		'valor_final',
		'calificacion',
		'id_tienda',
		'direccion',
		'valor_comision',
		'id_user'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
	}

	public function pedidos_estados()
	{
		return $this->hasMany(PedidosEstado::class, 'id_pedido');
	}

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'pedidos_productos', 'id_pedido', 'id_producto')
					->withPivot('id', 'cantidad', 'valor_unitario', 'valor_unitario_promocion', 'total_teorico', 'total_final', 'id_promocion');
	}
}
