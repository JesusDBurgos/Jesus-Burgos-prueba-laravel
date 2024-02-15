<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidosEstado
 * 
 * @property int $id
 * @property int $estado
 * @property int $id_pedido
 * @property Carbon $created_at
 * 
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class PedidosEstado extends Model
{
	protected $table = 'pedidos_estados';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'id_pedido' => 'int'
	];

	protected $fillable = [
		'estado',
		'id_pedido'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}
}
