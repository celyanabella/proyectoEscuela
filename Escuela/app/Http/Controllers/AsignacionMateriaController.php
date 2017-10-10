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
use Illuminate\Support\Facades\Session;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Input;
use Log;
use DB;

class AsignacionMateriaController extends Controller
{
    public function edit($id)
    {
        $usuarioactual=\Auth::user();
        
        $detalleAsignacion = DetalleAsignacion::findOrFail($id);
       /*  if ($asignacion==null) {
            $ban="err";
            return Redirect::to('asignacion/'.$ban);
        }
                
        $idasignacion = $asignacion->id_asignacion;
        $iddetalleasignacion = $asignacion->id_detalleasignacion;
        $idmaestro=$asignacion->mdui;
       // $idmateria=$asignacion->id_materia; */
        
        //buscando maestro
        $maestro=Maestro::where('mdui', $detalleAsignacion->mdui)->first();
        
        //buscando turno,grado,seccion con el detalle de la asignacion
        /* $detalle=DetalleAsignacion::where('id_detalleasignacion', $iddetalleasignacion)->first();
        $idDetGrado=$detalle->iddetallegrado; */
        $detalleGrado=DetalleGrado::where('iddetallegrado', $detalleAsignacion->iddetallegrado)->first();
        $grado=Grado::where('idgrado', $detalleGrado->idgrado)->first();
        $seccion=Seccion::where('idseccion', $detalleGrado->idseccion)->first();
        $turno=Turno::where('idturno', $detalleGrado->idturno)->first();
        //catalogo de materias
        $materias=Materia::all();

                  
                return view ("asignacion.materia.edit", ["asignacion"=>$detalleAsignacion,"grado"=>$grado,
                "seccion"=>$seccion,"turno"=>$turno,"materias"=>$materias,"anio"=>$detalleAsignacion->aniodetalleasignacion,
                'usuarioactual'=>$usuarioactual,"maestro"=>$maestro]);
    }
    public function update(AsignacionFormRequest $resquest, $id)
    {
        $usuarioactual=\Auth::user();
        $detalleAsignacion = DetalleAsignacion::findOrFail($id);
        if (Input::get('coordina')) {
            $detalleAsignacion->coordinador=1;       // El usuario marcó el checkbox 
        } else {
            $detalleAsignacion->coordinador=2;     // El usuario NO marcó el chechbox
        } 
        $detalleAsignacion->update();



        $a=Asignacion::where('id_detalleasignacion',$detalleAsignacion->id_detalleasignacion)->first();
        //$a = new Asignacion;
        //$a->id_asignacion=$id;
        //$a->id_detalleasignacion=$asignacion->id_detalleasignacion;
        $a->id_materia=$resquest->get('idm');
        $a->update();
        //$asignacion->id_materia=$resquest->get('idm');
        //$a->anioasignacion=$asignacion->anioasignacion;
       /*  $asignacion->update();
        $ban="si";
        return Redirect::to('asignacion/'.$ban); */
        Session::flash('si','Asignacion Actualizada Con Exito');
        return Redirect::to('asignacion');
    }
}
