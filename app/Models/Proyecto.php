<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $duracion
 * @property $costo
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $status
 * @property $tipo
 * @property $cantidad
 * @property $unidad_id
 * @property $responsable_id
 * @property $corporacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Corporacione $corporacione
 * @property Responsable $responsable
 * @property Unidadmedida $unidadmedida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'duracion' => 'required',
		'status' => 'required',
        'tipo' => 'required',
		'unidad_id' => 'required',
		'responsable_id' => 'required',
		'corporacion_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','duracion','costo','fecha_inicio','fecha_fin','status','tipo','cantidad','unidad_id','responsable_id','corporacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function corporacione()
    {
        return $this->hasOne('App\Models\Corporacione', 'id', 'corporacion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function responsable()
    {
        return $this->hasOne('App\Models\Responsable', 'id', 'responsable_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidadmedida()
    {
        return $this->hasOne('App\Models\Unidadmedida', 'id', 'unidad_id');
    }
    

}
