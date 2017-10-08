<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluacion';
    protected $primaryKey = 'id_evaluacion';
    public $timestamps = false;

    protected $fillable = [
        'id_actividad',
        'nombre',
        'porcentaje',
        'estado'
        
    ];

}
