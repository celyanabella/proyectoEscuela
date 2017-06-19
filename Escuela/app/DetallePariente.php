<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class DetallePariente extends Model
{
    protected $table = 'detalle_pariente';

    protected $primaryKey = 'id_detalle';

    public $timestamps = false;

    protected $fillable = [
    	'nie',
    	'id_matricula',
    	'parentesco'
    ];

    protected $guarded = [
    ];
}
