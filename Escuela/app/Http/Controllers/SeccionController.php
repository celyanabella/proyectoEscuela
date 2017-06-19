<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Seccion;
use Illuminate\Support\Facades\Redirect;
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
    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$secciones = DB::table('seccion')->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('idseccion','desc')
    		->paginate(7);
    		return view('detalle.seccion.index',["secciones"=>$secciones,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("detalle.seccion.create");
    }

    public function store( SeccionFormRequest $request)		//Para almacenar
    {
    	$seccion = new Seccion;
    	$seccion -> nombre = $request -> get('nombre');
    	$seccion -> estado = 'Activo';
    	$seccion -> save();

    	return Redirect::to('detalle/seccion');
    }

    public function show($id)		//Para mostrar
    {
    	return view("detalle.seccion.show",["seccion"=>Seccion::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("detalle.seccion.edit",["seccion"=>Seccion::findOrFail($id)]);
    }

    public function update(SeccionFormRequest $request, $id)
    {	
    	$seccion = Seccion::findOrFail($id);
    	$seccion -> nombre = $request -> get('nombre');
    	$seccion -> estado = 'Activo';
    	$seccion -> update();

    	return Redirect::to('detalle/seccion');
    }

    public function destroy($id)
    {
    	$seccion=Seccion::findOrFail($id);
    	$seccion -> estado = 'Inactivo';
    	$seccion->update();
    	return Redirect::to('detalle/seccion');
    }
}
