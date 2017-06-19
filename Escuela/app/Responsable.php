<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';

    protected $primaryKey = 'id_persona';

    public $timestamps = false;

    protected $fillable = [
    	'idresponsable',
    	'nie',
    	'nombre',
    	'apellido',
    	'ocupacion',
    	'lugardetrabajo',
    	'telefono',
    	'dui'
    ];

    protected $guarded = [
    ];
}
