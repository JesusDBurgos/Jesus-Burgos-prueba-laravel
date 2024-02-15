<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiendasPromocione
 * 
 * @property int $id
 * @property int $estado
 * @property Carbon $inicio
 * @property Carbon $fin
 * @property int $id_tienda
 * @property int $id_promocion
 * 
 * @property Tienda $tienda
 * @property Promocione $promocione
 *
 * @package App\Models
 */
class TiendasPromocione extends Model
{
	protected $table = 'tiendas_promociones';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'inicio' => 'datetime',
		'fin' => 'datetime',
		'id_tienda' => 'int',
		'id_promocion' => 'int'
	];

	protected $fillable = [
		'estado',
		'inicio',
		'fin',
		'id_tienda',
		'id_promocion'
	];

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
	}

	public function promocione()
	{
		return $this->belongsTo(Promocione::class, 'id_promocion');
	}
}
