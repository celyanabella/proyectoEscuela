<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class MaestroTrabajo extends Model
{
    protected $table = 'recordlaboral';

    protected $primaryKey = 'id_record';

    public $timestamps = false;

    protected $fillable = [
    	'id_hoja',
    	'cargo',
    	'lugar',
    	'tiempo',
    	'copia'
    ];

    protected $guarded = [
    ];
}
