<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class PartidaNacimiento extends Model
{

    protected $table = 'partidanacimiento';

    protected $primaryKey = 'id_partida';

    public $timestamps = false;

    protected $fillable = [
    	'nie',
    	'folio',
    	'libro',
    	'copiapartida'
    ];

    protected $guarded = [
    ];
}
