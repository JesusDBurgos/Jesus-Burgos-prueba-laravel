<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocione
 * 
 * @property int $id
 * @property int $estado
 * @property string $nombre
 * @property string|null $imagen
 * @property int|null $porcentaje
 * @property string $dias_semana
 * 
 * @property Collection|PedidosProducto[] $pedidos_productos
 * @property Collection|TiendasProducto[] $tiendas_productos
 * @property Collection|Tienda[] $tiendas
 *
 * @package App\Models
 */
class Promocione extends Model
{
	protected $table = 'promociones';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'porcentaje' => 'int'
	];

	protected $fillable = [
		'estado',
		'nombre',
		'imagen',
		'porcentaje',
		'dias_semana'
	];

	public function pedidos_productos()
	{
		return $this->hasMany(PedidosProducto::class, 'id_promocion');
	}

	public function tiendas_productos()
	{
		return $this->hasMany(TiendasProducto::class, 'id_promocion');
	}

	public function tiendas()
	{
		return $this->belongsToMany(Tienda::class, 'tiendas_promociones', 'id_promocion', 'id_tienda')
					->withPivot('id', 'estado', 'inicio', 'fin');
	}
}
