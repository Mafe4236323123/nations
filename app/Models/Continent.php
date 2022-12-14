<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a conectar
    protected $table = "continents";

    //clave primaria de la tabla
    protected $primaryKey = "continent_id";

    //omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    //relación entre continente y region
    public function regiones(){
        return $this->hasMany(Region::class, 'continent_id');
    }

    //relación entre continente y paises
    public function paises(){
        return $this->hasManyThrough(Region::class, Country::class, 'continent_id', 'region_id');
    }
}
