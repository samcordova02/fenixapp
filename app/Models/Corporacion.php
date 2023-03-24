<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Corporacion
 *
 * @property $id
 * @property $nombre
 * @property $rif
 * @property $imagen
 * @property $telefono
 * @property $gabinte_id
 * @property $dirrecion_id
 * @property $responsable
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Corporacion extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'rif' => 'required',
		'imagen' => 'required',
		'telefono' => 'required',
		'gabinte_id' => 'required',
		'dirrecion_id' => 'required',
		'responsable' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','rif','imagen','telefono','gabinte_id','dirrecion_id','responsable','correo'];



}
