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

use Illuminate\Support\Facades\Session;

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
        $usuarioactual=\Auth::user();


<<<<<<< HEAD
        $idgrado = $request->get('idgrado');
        $idseccion = $request->get('idseccion');
        $idturno = $request->get('idturno');

        $detalleGrado = DetalleGrado::where('idgrado','=',$idgrado)->where('idseccion','=',$idseccion)
        ->where('idturno','=',$idturno)->first();

=======
    $detalle= new DetalleGrado;
    $detalle-> idgrado = $request->get('idgrado');
		$detalle-> idseccion = $request->get('idseccion');
		$detalle-> idturno = $request->get('idturno');
		$detalle-> cupo= $request->get('cupo');
        $detalle->save();
 /*  
 foreach ($num as $num ) {
 if($num->idgrado != '2' && $num->idseccion != '2' && $num->idturno != 2){
          /*if($num->idseccion != $detalle-> idseccion){
             if($num->idturno !=  $detalle-> idturno){*/
               // $detalle->save();
           //  }/*}}*/

       
           //  } */
    
	    /*$detalle->save();*/
>>>>>>> origin/master

        //Si no se encuentra la consulta se agrega

        if(is_null($detalleGrado)){
            $detalle= new DetalleGrado;
            $detalle-> idgrado = $request->get('idgrado');
            $detalle-> idseccion = $request->get('idseccion');
            $detalle-> idturno = $request->get('idturno');
            $detalle-> cupo= $request->get('cupo');
            $detalle->save();

            Session::flash('create', ''.' Asignacion de cupos guardada Correctamente');

            return Redirect::to('asignacion_cupos');
        }else{

            $grado = Grado::where('idgrado','=',$idgrado)->first();
            $seccion = Seccion::where('idseccion','=',$idseccion)->first();
            $turno = Turno::where('idturno','=',$idturno)->first();

            Session::flash('message', '"'.$grado->nombre.'"'.'"'.$seccion->nombre.'"'.'"'.$turno->nombre.'"'.' Esa Asignación ya existe, Por favor verifique esa combinación');

            return Redirect::to('asignacion_cupos');
        }	
            
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