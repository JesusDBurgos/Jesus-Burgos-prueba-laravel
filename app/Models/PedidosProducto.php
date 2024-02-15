<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidosProducto
 * 
 * @property int $id
 * @property float $cantidad
 * @property float $valor_unitario
 * @property float $valor_unitario_promocion
 * @property float $total_teorico
 * @property float $total_final
 * @property int|null $id_promocion
 * @property int|null $id_producto
 * @property int $id_pedido
 * 
 * @property Pedido $pedido
 * @property Producto|null $producto
 * @property Promocione|null $promocione
 *
 * @package App\Models
 */
class PedidosProducto extends Model
{
	protected $table = 'pedidos_productos';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'float',
		'valor_unitario' => 'float',
		'valor_unitario_promocion' => 'float',
		'total_teorico' => 'float',
		'total_final' => 'float',
		'id_promocion' => 'int',
		'id_producto' => 'int',
		'id_pedido' => 'int'
	];

	protected $fillable = [
		'cantidad',
		'valor_unitario',
		'valor_unitario_promocion',
		'total_teorico',
		'total_final',
		'id_promocion',
		'id_producto',
		'id_pedido'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}

	public function promocione()
	{
		return $this->belongsTo(Promocione::class, 'id_promocion');
	}
}
