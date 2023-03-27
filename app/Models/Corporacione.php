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
<<<<<<< HEAD
 * @property $gabinete_id
 * @property $direcion_id
 * @property $responsable
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
=======
 * @property $responsable
 * @property $correo
 * @property $gabinete_id
 * @property $direcion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Direccione $direccione
 * @property Gabinete $gabinete
 * @property Proyecto[] $proyectos
 * @property Responsable[] $responsables
>>>>>>> proyecto
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
<<<<<<< HEAD
		'gabinete_id' => 'required',
		'direcion_id' => 'required',
		'responsable' => 'required',
		'correo' => 'required',
=======
		'responsable' => 'required',
		'correo' => 'required',
		'gabinete_id' => 'required',
		'direcion_id' => 'required',
>>>>>>> proyecto
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $fillable = ['nombre','rif','imagen','telefono','gabinete_id','direcion_id','responsable','correo'];


=======
    protected $fillable = ['nombre','rif','imagen','telefono','responsable','correo','gabinete_id','direcion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function direccione()
    {
        return $this->hasOne('App\Models\Direccione', 'id', 'direcion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gabinete()
    {
        return $this->hasOne('App\Models\Gabinete', 'id', 'gabinete_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto', 'corporacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsables()
    {
        return $this->hasMany('App\Models\Responsable', 'corporacion_id', 'id');
    }
    
>>>>>>> proyecto

}
