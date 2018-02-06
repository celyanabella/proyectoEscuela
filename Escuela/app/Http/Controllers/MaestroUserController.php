<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\MaestroUser;
use Escuela\Asignacion;
use Escuela\DetalleAsignacion;
use Escuela\DetalleGrado;
use Escuela\Grado;
use Escuela\Seccion;
use Escuela\Turno;
use Escuela\User;


use Illuminate\Support\Facades\Session;

use Carbon\Carbon; //Para la zona fecha horaria

use DB;

class MaestroUserController extends Controller
{
    public function __construct()	//para validar
    {
    }

    public function index(Request $request)
    {      
        $usuarioactual=\Auth::user();

    	if($request)
    	{	
    		//Se busca el docente registrado
 			$id_user = $usuarioactual->id;
 			$det_user = MaestroUser::where('id', $id_user)->first();
 			$mdui = $det_user->mdui;

            //Obtenemos el año presente
            $query3 = Carbon::now();
            $query3 = $query3->format('Y');

            //Obtenemos la fecha actual
            $date = Carbon::now(); 
            $date = $date->format('l jS \\of F Y h:i:s A');

            //Consulta todas las materias del docente

            //Asignaciones en el turno matutino

            $asig_mat =DB::table('asignacion')
                ->select('asignacion.id_asignacion', 'asignacion.id_detalleasignacion', 'asignacion.id_materia', 'asignacion.mdui', 'asignacion.anioasignacion', 'maestro.nombre',
                'maestro.apellido', 'materia.nombre as nombremateria', 'detalle_asignacion.iddetallegrado', 'detalle_grado.iddetallegrado', 'detalle_grado.idgrado', 'detalle_grado.idseccion',
                'detalle_grado.idturno', 'turno.nombre as nombreturno', 'seccion.nombre as nombreseccion', 'grado.nombre as nombregrado')
                ->join('maestro as maestro', 'asignacion.mdui', '=', 'maestro.mdui', 'full outer')
                ->join('detalle_asignacion as detalle_asignacion', 'asignacion.id_detalleasignacion', '=', 'detalle_asignacion.id_detalleasignacion', 'full outer')
                ->join('materia as materia', 'asignacion.id_materia', '=', 'materia.id_materia', 'full outer')
                ->join('detalle_grado as detalle_grado', 'detalle_asignacion.iddetallegrado', '=', 'detalle_grado.iddetallegrado', 'full outer')
                ->join('turno as turno', 'detalle_grado.idturno', '=', 'turno.idturno', 'full outer')
                ->join('seccion as seccion', 'detalle_grado.idseccion', '=', 'seccion.idseccion', 'full outer')
                ->join('grado as grado', 'detalle_grado.idgrado', '=', 'grado.idgrado', 'full outer')
                ->Where('asignacion.anioasignacion', '=', $query3)
                ->Where('maestro.mdui', '=', $mdui)
                ->Where('detalle_grado.idturno', '=', 1)    //Matutino
                ->orderBy('detalle_grado.idgrado', 'asc')
                ->get();


            //Asignaciones en el turno vespertino

            $asig_ver =DB::table('asignacion')
                ->select('asignacion.id_asignacion', 'asignacion.id_detalleasignacion', 'asignacion.id_materia', 'asignacion.mdui', 'asignacion.anioasignacion', 'maestro.nombre',
                'maestro.apellido', 'materia.nombre as nombremateria', 'detalle_asignacion.iddetallegrado', 'detalle_grado.iddetallegrado', 'detalle_grado.idgrado', 'detalle_grado.idseccion',
                'detalle_grado.idturno', 'turno.nombre as nombreturno', 'seccion.nombre as nombreseccion', 'grado.nombre as nombregrado')
                ->join('maestro as maestro', 'asignacion.mdui', '=', 'maestro.mdui', 'full outer')
                ->join('detalle_asignacion as detalle_asignacion', 'asignacion.id_detalleasignacion', '=', 'detalle_asignacion.id_detalleasignacion', 'full outer')
                ->join('materia as materia', 'asignacion.id_materia', '=', 'materia.id_materia', 'full outer')
                ->join('detalle_grado as detalle_grado', 'detalle_asignacion.iddetallegrado', '=', 'detalle_grado.iddetallegrado', 'full outer')
                ->join('turno as turno', 'detalle_grado.idturno', '=', 'turno.idturno', 'full outer')
                ->join('seccion as seccion', 'detalle_grado.idseccion', '=', 'seccion.idseccion', 'full outer')
                ->join('grado as grado', 'detalle_grado.idgrado', '=', 'grado.idgrado', 'full outer')
                ->Where('asignacion.anioasignacion', '=', $query3)
                ->Where('maestro.mdui', '=', $mdui)
                ->Where('detalle_grado.idturno', '=', 2)    //Vespertino
                ->orderBy('detalle_grado.idgrado', 'asc')
                ->get();    





 			return view('userDocente.materias.index',["date"=>$date,"mdui"=>$mdui,"asig_mat"=>$asig_mat, "asig_ver"=>$asig_ver, "usuarioactual"=>$usuarioactual]);
    	}
    }

    public function getLista(Request $request, $a1, $a2)
    {
        $usuarioactual=\Auth::user();
        if ($request) {

            $id=$a1;
            $id2=$a2;

            //Se procede a buscar la  asignacion dado el id_asignacion
            $asig = Asignacion::where('id_asignacion', $id)->first();

            //Se busca el detalle_asignacion
            $id_detalleasignacion = $asig->id_detalleasignacion;
            $detalle_asignacion = DetalleAsignacion::where('id_detalleasignacion', $id_detalleasignacion)->first();

            //Se busca el detalle_grado
            $iddetallegrado = $detalle_asignacion->iddetallegrado;
            $detalle_grado = DetalleGrado::where('iddetallegrado', $iddetallegrado)->first();

            //Se busca el grado seccion y turno
            $idgrado = $detalle_grado->idgrado;
            $idseccion = $detalle_grado->idseccion;
            $idturno = $detalle_grado->idturno;

            //Obtenemos los objetos
            $nGrado=Grado::where('idgrado','=',$idgrado)->first();
            $nSeccion=Seccion::where('idseccion','=',$idseccion)->first();
            $nTurno=Turno::where('idturno','=',$idturno)->first();       

             
            //Obtenemos el año presente
            $query3 = Carbon::now();
            $query3 = $query3->format('Y');

            //Obtenemos la fecha actual
            $date = Carbon::now(); 
            $date = $date->format('l jS \\of F Y h:i:s A');

            //$query3 = 2017;
            $query = trim($request->get('searchText'));
            $est = DB::table('estudiante')
                ->select('estudiante.nombre','estudiante.apellido','estudiante.nie','matricula.fechamatricula')
                ->join('matricula as matricula','estudiante.nie','=','matricula.nie','full outer')
                ->join('detalle_grado as detalle_grado','matricula.iddetallegrado','=','detalle_grado.iddetallegrado','full outer')
                ->where('matricula.iddetallegrado','=',$iddetallegrado)
                ->whereYear('matricula.fechamatricula','=',$query3)
                ->where('estudiante.apellido','LIKE','%'.$query.'%')
                ->orderby('estudiante.apellido','asc')
                ->get();

            if ($est==null) {

                    Session::flash('message',"No hay Estudiantes Inscritos en este Curso");
                    return view("userDocente.lista.estudiantes",["date"=>$date, "nGrado"=>$nGrado, "nSeccion"=>$nSeccion, "nTurno"=>$nTurno, "est"=>$est, "usuarioactual"=>$usuarioactual]);
        
                }

            return view('userDocente.lista.estudiantes',["searchText"=>$query, "date"=>$date, "nGrado"=>$nGrado, "nSeccion"=>$nSeccion, "nTurno"=>$nTurno,"est"=>$est, "usuarioactual"=>$usuarioactual]);
        }
         
    }

    public function show($id)
    {
        $usuarioactual=\Auth::user();
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }


    public function edit($g,$s,$t)
    {
        $usuarioactual=\Auth::user();

        if ($g == 1 or $g == 2 or $g == 3) {

            return view('userDocente.notas.show', ["usuarioactual"=>$usuarioactual]);

        }elseif ($g == 4 or $g == 5 or $g == 6 or $g == 7 or $g == 8 or $g == 9) {

             return view("userDocente.notas.edit",["usuarioactual"=>$usuarioactual]);

        }      
    }

    public function update()
    {
        
    }

    
}
