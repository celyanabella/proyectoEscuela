<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turno';

    protected $primaryKey = 'idturno';

    public $timestamps = false;

    protected $fillable = [
    	'nombre'
    ];

    protected $guarded = [
    ];
}
