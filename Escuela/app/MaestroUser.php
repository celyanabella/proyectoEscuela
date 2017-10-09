<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class MaestroUser extends Model
{
    protected $table = 'user_detalle';

    protected $primaryKey = 'id_detalleuser';

    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'mdui'
    ];

    protected $guarded = [
    ];
}
