<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $table = 'maestro';
    protected $primarykey = 'mdui';
    public $timestamps = false;

    protected $fillable= [
    	'id',
    	'id_estado',
    	'nombre',
    	'apellido',
    	'sexo',
    	'direccion',
    	'telefono',
    	'fechanacimiento',
    	'afp',
    	'nip',
    	'dui',
    	'nit',
    	'inpep',
        'extendido',
    	'fotografia',
    	'estado'
    ];

    protected $guarded = [
    ];
}
