<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsable
 *
 * @property $id
 * @property $nombre
 * @property $telefono
 * @property $correo
 * @property $cargo
 * @property $imagen
 * @property $corporacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Responsable extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'cargo' => 'required',
		'imagen' => 'required',
		'corporacion_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','telefono','correo','cargo','imagen','corporacion_id'];



}
