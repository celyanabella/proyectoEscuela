<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignacion';

    protected $primaryKey = 'id_asignacion';

    public $timestamps = false;

    protected $fillable = [
    	'id_detalleasignacion',
    	'id_materia',
        'mdui',
        'anioasignacion'

    ];

    protected $guarded = [
    ];
}