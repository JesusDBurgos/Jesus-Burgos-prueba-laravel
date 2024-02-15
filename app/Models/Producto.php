<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property int $estado
 * @property int $kit
 * @property string $barcode
 * @property string $nombre
 * @property string $presentacion
 * @property string|null $descripcion
 * @property string|null $foto
 * @property float $peso
 * 
 * @property Collection|Carrito[] $carritos
 * @property Collection|Pedido[] $pedidos
 * @property Collection|Tienda[] $tiendas
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'kit' => 'int',
		'peso' => 'float'
	];

	protected $fillable = [
		'estado',
		'kit',
		'barcode',
		'nombre',
		'presentacion',
		'descripcion',
		'foto',
		'peso'
	];

	public function carritos()
	{
		return $this->hasMany(Carrito::class, 'id_producto');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'pedidos_productos', 'id_producto', 'id_pedido')
					->withPivot('id', 'cantidad', 'valor_unitario', 'valor_unitario_promocion', 'total_teorico', 'total_final', 'id_promocion');
	}

	public function tiendas()
	{
		return $this->belongsToMany(Tienda::class, 'tiendas_productos', 'id_producto', 'id_tienda')
					->withPivot('id', 'compra_maxima', 'valor', 'id_promocion');
	}
}
