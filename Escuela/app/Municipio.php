<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';

    protected $primaryKey = 'id_municipio';

    public $timestamps = false;

    protected $fillable = [
    	'id_departamento',
    	'nombre',
    	'codigo'
    ];

    protected $guarded = [
    ];
}
