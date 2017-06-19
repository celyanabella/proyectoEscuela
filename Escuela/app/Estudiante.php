<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';
    protected $primarykey = 'nie';
    public $timestamps = false;

    protected $fillable= [
    	'id_partida',
    	'nombre',
    	'apellido',
    	'fechadenacimiento',
    	'sexo',
    	'discapacidad',
    	'domicilio',
    	'enfermedad',
    	'zonaurbana',
    	'autorizavacuna',
    	'estado',
        'id',
    	'estado'
    ];

    protected $guarded = [
    ];
}
