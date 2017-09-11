<?php
namespace Escuela\Http\Controllers;

use Escuela\Grado;
use Escuela\Seccion;
use Escuela\Turno;
use Escuela\DetalleGrado;
use Escuela\DetalleAsignacion;
use Escuela\Maestro;
use Escuela\Asignacion;
use Escuela\Materia;
use Illuminate\Http\Request;
use Escuela\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\AsignacionFormRequest;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Database\Connection;
use Log;
use DB;

class AsignacionMateriaController extends Controller
{
    public function edit($id)
    {
        $usuarioactual=\Auth::user();
        
        $asignacion = Asignacion::findOrFail($id);
        if ($asignacion==null) {
            $ban="err";
            return Redirect::to('asignacion/'.$ban);
        }
                
        $idasignacion = $asignacion->id_asignacion;
        $iddetalleasignacion = $asignacion->id_detalleasignacion;
        $idmaestro=$asignacion->mdui;
       // $idmateria=$asignacion->id_materia;
        
        //buscando maestro
        $maestro=Maestro::where('mdui', $idmaestro)->first();
        
        //buscando turno,grado,seccion con el detalle de la asignacion
        $detalle=DetalleAsignacion::where('id_detalleasignacion', $iddetalleasignacion)->first();
        $idDetGrado=$detalle->iddetallegrado;
        $detalleGrado=DetalleGrado::where('iddetallegrado', $idDetGrado)->first();
        $grado=Grado::where('idgrado', $detalleGrado->idgrado)->first();
        $seccion=Seccion::where('idseccion', $detalleGrado->idseccion)->first();
        $turno=Turno::where('idturno', $detalleGrado->idturno)->first();
        //catalogo de materias
        $materias=Materia::all();

                  
                return view ("asignacion.materia.edit", ["asignacion"=>$asignacion,"grado"=>$grado,
                "seccion"=>$seccion,"turno"=>$turno,"materias"=>$materias,"anio"=>$asignacion->anioasignacion,
                'usuarioactual'=>$usuarioactual,"maestro"=>$maestro]);
    }
    public function update(AsignacionFormRequest $resquest, $id)
    {
        $usuarioactual=\Auth::user();
        $asignacion = Asignacion::findOrFail($id);
      
        $a = new Asignacion;
        $a->id_asignacion=$id;
        $a->id_detalleasignacion=$asignacion->id_detalleasignacion;
        $a->mdui=$asignacion->mdui;
        $a->id_materia=$resquest->get('idm');
        $a->anioasignacion=$asignacion->anioasignacion;
        $a->update();;
        $ban="si";
        return Redirect::to('asignacion/'.$ban);
    }
}
