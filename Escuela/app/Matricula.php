<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';

    protected $primaryKey = 'id_matricula';

    public $timestamps = false;

    protected $fillable = [
    	'nie',
    	'iddetallegrado',
    	'presentapartida',
    	'certificadoprom',
    	'presentafotos',
    	'constanciaconducta',
    	'educacioninicial',
    	'fechamatricula',
    	'repitegrado',
    	'fotografia',
        'cePrevio',
    	'estado'
    ];

    protected $guarded = [
    ];
}
