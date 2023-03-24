<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $nombre
 * @property $estados_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Parroquia[] $parroquias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'estados_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estados_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estados_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parroquias()
    {
        return $this->hasMany('App\Models\Parroquia', 'municipios_id', 'id');
    }
    

}
