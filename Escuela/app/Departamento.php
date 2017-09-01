<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';

    protected $primaryKey = 'id_departamento';

    public $timestamps = false;

    protected $fillable = [
    	'id_hoja',
    	'nombre',
    	'codigo'
    ];

    protected $guarded = [
    ];
}
