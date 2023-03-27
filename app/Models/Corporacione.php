<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Corporacione
 *
 * @property $id
 * @property $nombre
 * @property $rif
 * @property $imagen
 * @property $telefono
 * @property $gabinete_id
 * @property $direcion_id
 * @property $responsable
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Corporacione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'rif' => 'required',
		'imagen' => 'required',
		'telefono' => 'required',
		'gabinete_id' => 'required',
		'direcion_id' => 'required',
		'responsable' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','rif','imagen','telefono','gabinete_id','direcion_id','responsable','correo'];



}
