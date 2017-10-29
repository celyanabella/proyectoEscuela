<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;
use Escuela\Http\Requests;
use Escuela\Trimestre;
use Escuela\Actividad;
use Escuela\Materia;
use Escuela\MaestroUser;
use Escuela\DetalleEvaluacion;
use Escuela\Evaluacion;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;




class EvaluacionController extends Controller
{
     public function indice(Request $request)
    {
        $usuarioactual=\Auth::user();

        //Se busca el docente registrado
        $id_user = $usuarioactual->id;
        $det_user = MaestroUser::where('id', $id_user)->first();
        $mdui = $det_user->mdui;

        //catalogo de trimestres
        $trimestres=DB::table('trimestre')->get();
        //catalogo de actividades
        $actividades=DB::table('actividad')->get();
        //catalogo de materias
        $materias=DB::table('materia')
        ->orderby('materia.nombre','asc')
        ->get();
        $query3 = Carbon::now();
        $query3 = $query3->format('Y');

        //Asignaciones en el turno matutino

        $asig_mat =DB::table('asignacion')
        ->select('asignacion.id_asignacion', 'asignacion.id_detalleasignacion', 'asignacion.id_materia', 'asignacion.mdui', 'asignacion.anioasignacion', 'maestro.nombre',
        'maestro.apellido', 'materia.nombre as nombremateria','materia.estado', 'detalle_asignacion.iddetallegrado', 'detalle_grado.iddetallegrado', 'detalle_grado.idgrado', 'detalle_grado.idseccion',
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

        return view('userDocente.evaluaciones.index1',['usuarioactual'=>$usuarioactual,"actividades"=>$actividades,"trimestres"=>$trimestres,"materias"=>$materias,"asig_mat"=>$asig_mat, "asig_ver"=>$asig_ver]);
    } 


    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();

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





         return view('userDocente.evaluaciones.index', ["date"=>$date,"mdui"=>$mdui,"asig_mat"=>$asig_mat, "asig_ver"=>$asig_ver, "usuarioactual"=>$usuarioactual]);



      

        
       /*  //catalogo de trimestres
        $trimestres=DB::table('trimestre')->get();
        $actividades=DB::table('actividad')->get();

        return view('userDocente.evaluaciones.index',['usuarioactual'=>$usuarioactual,"actividades"=>$actividades,"trimestres"=>$trimestres]); */
    }

    public function store(Request $request)
    {
        $evaluacion = new Evaluacion;
        $evaluacion->id_actividad=$request->get('idactividad');
        $evaluacion->nombre=$request->get('nombreEvaluacion');
        $evaluacion->porcentaje=$request->get('porcentaje');
        $evaluacion->estado='Activo';
        $evaluacion->save();

        $detalles=DetalleEvaluacion::where('id_asignacion',$request->get('asg'))->where('id_evaluacion',null) ->get();
        foreach ($detalles as $detalle) {
            if($detalle->id_evaluacion==null)
            {
                $detalle->id_evaluacion = $evaluacion->id_evaluacion;
                $detalle->update();
                Session::flash('exito',"se guardo exitosamente la evaluacion");
                return back();
            }

            

        }
        //$detEval= DetalleEvaluacion::where('id_asignacion',$request->get('asg'))->first();
        Session::flash('fallo',"Hubo un error, verifique si ha alcanzado el numero maximo de evaluaciones");
        
        return back();

    }

    public function getLista(Request $request, $a1, $a2, $nG, $nS, $nT,$nM)
    {
        $usuarioactual=\Auth::user();
        if ($request) {
            $id=$a1;
           /* $id2=$a2; */

          

           /*  //Se procede a buscar la  asignacion dado el id_asignacion
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

            //se busca el detalle as

            //Obtenemos los objetos
            $nGrado=Grado::where('idgrado','=',$idgrado)->first();
            $nSeccion=Seccion::where('idseccion','=',$idseccion)->first();
            $nTurno=Turno::where('idturno','=',$idturno)->first();     */

             
            //Obtenemos el año presente
            $query3 = Carbon::now();
            $query3 = $query3->format('Y');

            //Obtenemos la fecha actual
            $date = Carbon::now();
            $date = $date->format('l jS \\of F Y h:i:s A');
            $trimestres=DB::table('trimestre')->get();
            $actividades=DB::table('actividad')->get();

            $detalleEvaluacion = DB::table('evaluacion')
            ->select('detalleevaluacion.id_evaluacion','detalleevaluacion.id_asignacion','evaluacion.id_evaluacion','evaluacion.id_actividad','evaluacion.nombre as nombreEvaluacion',
            'evaluacion.porcentaje as pEval','actividad.id_actividad','actividad.id_trimestre','actividad.nombre as nombreActividad','actividad.porcentaje as pAct',
            'trimestre.id_trimestre','trimestre.nombre as nombreTrimestre','evaluacion.estado')
           // ->join('evaluacion as evaluacion','detalleevaluacion.id_evaluacion','=','evaluacion.id_evaluacion','full outer')
            ->join('detalleevaluacion as detalleevaluacion','detalleevaluacion.id_evaluacion','=','evaluacion.id_evaluacion','full outer')
            ->join('actividad as actividad','evaluacion.id_actividad','=','actividad.id_actividad', 'full outer')
            ->join('trimestre as trimestre','actividad.id_trimestre','=','trimestre.id_trimestre', 'full outer')
            ->where('detalleevaluacion.id_asignacion','=',$id)
            ->get();
            //$query3 = 2017;
           /*  $query = trim($request->get('searchText'));
            $est = DB::table('estudiante')
                ->select('estudiante.nombre', 'estudiante.apellido', 'estudiante.nie', 'matricula.fechamatricula')
                ->join('matricula as matricula', 'estudiante.nie', '=', 'matricula.nie', 'full outer')
                ->join('detalle_grado as detalle_grado', 'matricula.iddetallegrado', '=', 'detalle_grado.iddetallegrado', 'full outer')
                ->where('matricula.iddetallegrado', '=', $iddetallegrado)
                ->whereYear('matricula.fechamatricula', '=', $query3)
                ->where('estudiante.apellido', 'LIKE', '%'.$query.'%')
                ->orderby('estudiante.apellido', 'asc')
                ->get(); */



            /* if ($est==null) {
                    Session::flash('message', "No hay Estudiantes Inscritos en este Curso");
                    return view("userDocente.lista.estudiantes", ["date"=>$date, "nGrado"=>$nG, "nSeccion"=>$nS, "nTurno"=>$nT, "est"=>$est, "usuarioactual"=>$usuarioactual]);
            } */



            return view('userDocente.evaluaciones.lista', ["asignacion"=>$a1, "actividades"=>$actividades,"trimestres"=>$trimestres,  "nGrado"=>$nG, "nSeccion"=>$nS, "nTurno"=>$nT,"nMateria"=>$nM, "usuarioactual"=>$usuarioactual, "evaluaciones"=>$detalleEvaluacion]);
        }
    }


    public function edit($g, $s, $t)
    {
        $usuarioactual=\Auth::user();

        if ($g == 1 or $g == 2 or $g == 3) {
            return view('userDocente.notas.show', ["usuarioactual"=>$usuarioactual]);
        } elseif ($g == 4 or $g == 5 or $g == 6 or $g == 7 or $g == 8 or $g == 9) {
             return view("userDocente.notas.edit", ["usuarioactual"=>$usuarioactual]);
        }
    }
}
