<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';

    protected $primaryKey = 'id_municipio';

    public $timestamps = false;

    protected $fillable = [
        'id_hoja',
        'id_departamento',
        'nombre',
        'codigo'
    ];

    public static function municipios($id){
        return Municipio::where('id_departamento','=',$id)->get();
    }

    protected $guarded = [
    ];
}
