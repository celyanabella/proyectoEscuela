<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class TipoResponsable extends Model
{
    protected $table = 'tipo_responsable';

    protected $primaryKey = 'idresponsable';

    public $timestamps = false;

    protected $fillable = [
    	'nombretipo'
    ];

    protected $guarded = [
    ];
}