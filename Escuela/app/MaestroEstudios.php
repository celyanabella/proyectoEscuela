<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class MaestroEstudios extends Model
{
    protected $table = 'estudios';

    protected $primaryKey = 'id_estudios';

    public $timestamps = false;

    protected $fillable = [
    	'id_hoja',
    	'institucion',
    	'tipo',
    	'especialidad',
    	'copia'
    ];

    protected $guarded = [
    ];
}