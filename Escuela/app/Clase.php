<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clase';

    protected $primaryKey = 'id_clase';

    public $timestamps = false;

    protected $fillable = [
    	'clase'
    ];

    protected $guarded = [
    ];
}
