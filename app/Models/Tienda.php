<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tienda
 * 
 * @property int $id
 * @property int $estado
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $telefono
 * @property string $direccion
 * @property string|null $direccion_anexo
 * @property string|null $direccion_barrio
 * @property float $calificacion
 * @property int $calificacion_cantidad
 * @property int $impuestos
 * @property string $dias_trabajados
 * 
 * @property Collection|Carrito[] $carritos
 * @property Collection|Pedido[] $pedidos
 * @property Collection|TiendasDistancia[] $tiendas_distancias
 * @property Collection|Producto[] $productos
 * @property Collection|Promocione[] $promociones
 *
 * @package App\Models
 */
class Tienda extends Model
{
	protected $table = 'tiendas';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'calificacion' => 'float',
		'calificacion_cantidad' => 'int',
		'impuestos' => 'int'
	];

	protected $fillable = [
		'estado',
		'nombre',
		'descripcion',
		'telefono',
		'direccion',
		'direccion_anexo',
		'direccion_barrio',
		'calificacion',
		'calificacion_cantidad',
		'impuestos',
		'dias_trabajados'
	];

	public function carritos()
	{
		return $this->hasMany(Carrito::class, 'id_tienda');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_tienda');
	}

	public function tiendas_distancias()
	{
		return $this->hasMany(TiendasDistancia::class, 'id_tienda');
	}

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'tiendas_productos', 'id_tienda', 'id_producto')
					->withPivot('id', 'compra_maxima', 'valor', 'id_promocion');
	}

	public function promociones()
	{
		return $this->belongsToMany(Promocione::class, 'tiendas_promociones', 'id_tienda', 'id_promocion')
					->withPivot('id', 'estado', 'inicio', 'fin');
	}
}
