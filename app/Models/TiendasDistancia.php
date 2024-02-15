<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiendasDistancia
 * 
 * @property int $id
 * @property int $id_tienda
 * @property int $valor
 * @property int|null $desde
 * @property int|null $hasta
 * 
 * @property Tienda $tienda
 *
 * @package App\Models
 */
class TiendasDistancia extends Model
{
	protected $table = 'tiendas_distancias';
	public $timestamps = false;

	protected $casts = [
		'id_tienda' => 'int',
		'valor' => 'int',
		'desde' => 'int',
		'hasta' => 'int'
	];

	protected $fillable = [
		'id_tienda',
		'valor',
		'desde',
		'hasta'
	];

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
	}
}
