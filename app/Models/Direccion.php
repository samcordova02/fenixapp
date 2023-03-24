<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccion
 *
 * @property $id
 * @property $descripcion
 * @property $municipios_id
 * @property $parroquias_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Direccion extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'municipios_id' => 'required',
		'parroquias_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','municipios_id','parroquias_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'municipios_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->hasOne('App\Models\Parroquia', 'id', 'parroquias_id');
    }
    

}
