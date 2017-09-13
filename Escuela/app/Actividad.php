<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = 'actividad';

    protected $primaryKey = 'id_actividad';

    public $timestamps = false;

    protected $fillable = [
        'periodo',
    	'porcentaje'
    ];

    protected $guarded = [
    ];
}
