<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class DetalleGrado extends Model
{
    protected $table = 'detalle_grado';

    protected $primaryKey = 'iddetallegrado';

    public $timestamps = false;

    protected $fillable = [
    	'idgrado',
    	'idseccion',
    	'idturno'
    ];

    protected $guarded = [
    ];
}
