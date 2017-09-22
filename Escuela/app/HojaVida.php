<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class HojaVida extends Model
{
    protected $table = 'hojadevida';
    protected $primarykey = 'id_hoja';
    public $timestamps = false;

    protected $fillable= [
        'id_municipio',
        'mdui',
        'id_clase',
        'id_categoria',
        'id_nivel',
        'cenombrado',
        'codigoinstitucion',
        'fechaingresopublico',
        'fechalaboral',
        'ultimoascenso',
        'aniosservicio',
        'proximoascenso',
        'cargo',
        'funciones',
        'nacimientoextranjero',
        'estado'
    ];

    protected $guarded = [
    ];
}
