<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    protected $table= 'trimestre';

    protected $primaryKey = 'id_trimestre';

    public $timestamps= false;

    protected $fillable = [
        'nombre'
    ];
}
