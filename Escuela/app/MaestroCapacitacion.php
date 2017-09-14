<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class MaestroCapacitacion extends Model
{
    protected $table = 'capacitacion';

    protected $primaryKey = 'id_capacitacion';

    public $timestamps = false;

    protected $fillable = [
    	'id_hoja',
    	'anio',
    	'nombre',
    	'horas',
    	'copia'
    ];

    protected $guarded = [
    ];
}
