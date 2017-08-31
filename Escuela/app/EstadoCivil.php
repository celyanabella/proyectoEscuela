<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    
    protected $table = 'estadocivil';

    protected $primaryKey = 'id_estado';

    public $timestamps = false;

    protected $fillable = [
    	'tipo'
    ];

    protected $guarded = [
    ];
}
