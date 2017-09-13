<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Escuela\User;
use Escuela\Http\Requests;
use Escuela;
use Storage;
use Escuela\Turno;
use Escuela\Seccion;

use Escuela\Grado;
use Escuela\DetalleGrado;
use Escuela\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Escuela\TipoUsuario;
use Escuela\Http\Requests\DetalleGradoFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;

class CupoController extends Controller
{
    
  public function __construct()
    {
      $this->middleware('auth');
    }



    public function index(Request $request){

         $usuarioactual=\Auth::user();

         $grado=Grado::all();
         $seccion=Seccion::all();
         $turno=Turno::all();
         $detalle=DetalleGrado::all();
         return view('cupos.index')
        ->with("grado", $grado ) 
        ->with("seccion", $seccion )
        ->with("turno", $turno)
        ->with("detalle", $detalle)
       
        ->with("usuarioactual", $usuarioactual);

         
    }

    public function create()

    {
        $usuarioactual=\Auth::user();
        $tiposusuario=TipoUsuario::all();


        $grado=Grado::all();
        $seccion=Seccion::all();
        $turno=Turno::all();

        $grados = Grado::where('grado.estado','=','Activo')->orderBy('grado.idgrado','asc');   

        $secciones = Seccion::where('seccion.estado','=','Activo')->orderBy('seccion.idseccion','asc');

        $turnos = Turno::where('turno.estado','=','Activo')->orderBy('turno.idturno','asc');


       return view('cupos.create',["grado"=>$grado,"seccion"=>$seccion,"turno"=>$turno,"usuarioactual"=>$usuarioactual]);
    }

     public function store(Request $request)		//Para almacenar
    {
        $grado=Grado::all();
         $seccion=Seccion::all();
         $turno=Turno::all();
        $usuarioactual=\Auth::user();
        $num=DetalleGrado::all();


    $detalle= new DetalleGrado;
    $detalle-> idgrado = $request->get('idgrado');
		$detalle-> idseccion = $request->get('idseccion');
		$detalle-> idturno = $request->get('idturno');
		$detalle-> cupo= $request->get('cupo');


   /* foreach ($num as $num ) {
      if($num->grado->idgrado!=$detalle-> idgrado){
          if($num->seccion!=$detalle-> idseccion){
             if($num->turno!=$detalle-> idturno){

             }}}

             $detalle->save();
    }*/
	    $detalle->save();


    	return Redirect::to('asignacion_cupos');
            
    }


   public function edit($id)
    {
        $usuarioactual=\Auth::user();
        
    	return view("cupos.edit",["detalle"=>DetalleGrado::findOrFail($id),  "usuarioactual"=>$usuarioactual]);
    }

     public function update(Request $request, $id)
    {	
        $usuarioactual=\Auth::user();

    	$detalle = DetalleGrado::findOrFail($id);
    	$detalle-> cupo= $request->get('cupo');
    	
    	$detalle -> update();

    	return Redirect::to('asignacion_cupos');
    }

}
