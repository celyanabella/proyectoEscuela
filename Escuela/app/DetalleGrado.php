<?php

namespace Escuela;
use Escuela\Turno;
use Escuela\Seccion;
use Escuela\Grado;
use Illuminate\Database\Eloquent\Model;



class DetalleGrado extends Model
{
    protected $table = 'detalle_grado';

    protected $primaryKey = 'iddetallegrado';

    public $timestamps = false;

    protected $fillable = [
    	'idgrado',
    	'idseccion',
    	'idturno',
        'cupo'
    ];

     public function grado($idgrado)
      {
        $resul=Grado::find($idgrado);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }

      public function seccion($idseccion)
      {
        $resul=Seccion::find($idseccion);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }

      public function turno($idturno)
      {
        $resul=Turno::find($idturno);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      
}
    protected $guarded = [
    ];
}
