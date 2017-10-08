<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Trimestre;
use Escuela\Actividad;
use Escuela\Materia;
use DB;

class EvaluacionController extends Controller
{
    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();





        //catalogo de trimestres
        $trimestres=DB::table('trimestre')->get();
        //catalogo de actividades
        $actividades=DB::table('actividad')->get();
        //catalogo de materias
        $materias=DB::table('materia')
        ->orderby('materia.nombre','asc')
        ->get();

        return view('evaluaciones.index',['usuarioactual'=>$usuarioactual,"actividades"=>$actividades,"trimestres"=>$trimestres,"materias"=>$materias]);
    }


    public function show($id)
    {
        $usuarioactual=\Auth::user();

        $consulta=DB::table('evaluacion')
        ->select('evaluacion.id_evaluacion','evaluacion.id_actividad','evaluacion.nombre','evaluacion.porcentaje','evaluacion.estado')
        ->where('id_materia','=',$id)
        ->get();


        
        //catalogo de trimestres
        $trimestres=DB::table('trimestre')->get();
        $actividades=DB::table('actividad')->get();

        return view('evaluaciones.index',['usuarioactual'=>$usuarioactual,"actividades"=>$actividades,"trimestres"=>$trimestres]);
    }

    public function store(Request $request)
    {

    }
}
