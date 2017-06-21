<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Seccion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Escuela\Http\Requests\SeccionFormRequest;
use DB;


class SeccionController extends Controller
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
    		$secciones = DB::table('seccion')->where('nombre','LIKE','%'.$query.'%')
            ->where('seccion.estado','Activo')
    		->orderBy('idseccion','asc')
    		->paginate(7);
    		return view('detalle.seccion.index',["secciones"=>$secciones,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.seccion.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( SeccionFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$seccion = new Seccion;
    	$seccion -> nombre = $request -> get('nombre');
    	$seccion -> estado = 'Activo';
    	$seccion -> save();

    	return Redirect::to('detalle/seccion');
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();

    	return view("detalle.seccion.show",["seccion"=>Seccion::findOrFail($id)]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();
        
    	return view("detalle.seccion.edit",["seccion"=>Seccion::findOrFail($id),  "usuarioactual"=>$usuarioactual]);
    }

    public function update(SeccionFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();

    	$seccion = Seccion::findOrFail($id);
    	$seccion -> nombre = $request -> get('nombre');
    	$seccion -> estado = 'Activo';
    	$seccion -> update();

    	return Redirect::to('detalle/seccion');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$seccion=Seccion::findOrFail($id);
        $seccion->estado='Inactivo';
    	$seccion->update();

        Session::flash('message', '"'.$seccion->nombre.'"'.' fue eliminado de nuestros registros',["usuarioactual"=>$usuarioactual]);

    	return Redirect::to('detalle/seccion');
    }
}
