<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiendasProducto
 * 
 * @property int $id
 * @property float $compra_maxima
 * @property float $valor
 * @property int|null $id_promocion
 * @property int $id_tienda
 * @property int $id_producto
 * 
 * @property Tienda $tienda
 * @property Producto $producto
 * @property Promocione|null $promocione
 *
 * @package App\Models
 */
class TiendasProducto extends Model
{
	protected $table = 'tiendas_productos';
	public $timestamps = false;

	protected $casts = [
		'compra_maxima' => 'float',
		'valor' => 'float',
		'id_promocion' => 'int',
		'id_tienda' => 'int',
		'id_producto' => 'int'
	];

	protected $fillable = [
		'compra_maxima',
		'valor',
		'id_promocion',
		'id_tienda',
		'id_producto'
	];

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
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
