<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parroquia
 *
 * @property $id
 * @property $nombre
 * @property $municipios_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parroquia extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'municipios_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','municipios_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'municipios_id');
    }
    

}
