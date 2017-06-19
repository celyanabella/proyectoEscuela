<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccion';

    protected $primaryKey = 'idseccion';

    public $timestamps = false;

    protected $fillable = [
    	'nombre'
    ];

    protected $guarded = [
    ];
}
