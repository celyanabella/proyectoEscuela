<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Actividad;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Escuela\Http\Requests\ActividadFormRequest;
use DB;

class ActividadController extends Controller
{
     public function __construct()	//para validar
    {
        #$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();

    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$actividad = DB::table('actividad')->where('trimestre','LIKE','%'.$query.'%')
           // ->where('grado.estado','Activo')
    		->orderBy('id_actividad','asc')
    		->paginate(9);
    		return view('detalle.actividad.index',["actividad"=>$actividad,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.actividad.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( ActividadFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$actividad= new Actividad;
    	$actividad -> periodo= $request -> get('periodo');
    	$actividad -> porcentaje= $request -> get('porcentaje');
    	$actividad -> save();

    	return Redirect::to('detalle/actividad');
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.actividad.show",["actividad"=>Actividad::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.actividad.edit",["actividad"=>Actividad::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function update(ActividadFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();
        
    	$actividad = Actividad::findOrFail($id);
    	$actividad -> periodo = $request -> get('periodo');
    	$actividad -> porcentaje = $request -> get('porcentaje');
    	$actividad -> update();

    	return Redirect::to('detalle/actividad');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$actividad=Actividad::findOrFail($id);
        actividad::destroy($id);
        $actividad->update();

        Session::flash('message', '"'.$actividad->periodo.'"'.' fue eliminado de nuestros registros');

    	return Redirect::to('detalle/actividad');
    }

     public function porcentaje($id)
    {
        $usuarioactual=\Auth::user();
        $actividad = $_GET['porcentaje'];
       $por = 100;

       $actual = $por-$actividad;

       echo"<br/> &nbsp; porcentaje". $actual. " ";
        return view("detalle.actividad.create",["actividad"=>Actividad::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }



}

