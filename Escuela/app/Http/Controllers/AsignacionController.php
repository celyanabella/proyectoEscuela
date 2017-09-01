<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Asignacion;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\AsignacionFormRequest;
use DB;

class AsignacionController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();
        
        //consulta que envia datos al index en asignacion como un objeto "consulta"
        $consulta=DB::table('asignacion')
        ->select('asignacion.id_asignacion','asignacion.id_detalleasignacion','asignacion.id_materia','asignacion.id_maestro','asignacion.anioasignacion'
        ,'maestro.nombremaestro','maestro.apellidomaestro','materia.nombremateria')
        ->join('maestro as maestro','asignacion.id_maestro','=','maestro.id_maestro','full outer')
        ->join('detalle_asignacion as detalle_asignacion','asignacion.id_detalleasignacion','=','detalle_asignacion.id_detalleasignacion','full outer')
        ->join('materia as materia','asignacion.id_materia','=','materia.id_materia','full outer')
        ->get();

        

    return view('asignacion.index',['usuarioactual'=>$usuarioactual,"asgs"=>$consulta]);

    }

    public function show($id)		//Para mostrar
    {
    	
    }
}
