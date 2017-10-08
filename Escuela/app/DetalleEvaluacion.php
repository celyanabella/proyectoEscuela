<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class DetalleEvaluacion extends Model
{
    protected $table = 'detalleevaluacion';
    protected $primaryKey = 'id_detalleevaluacion';
    public $timestamps = false;

    protected $fillable=[
        'id_evaluacion',
        'id_asignacion'
    ];
}
