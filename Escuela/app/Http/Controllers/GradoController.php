<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Grado;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\GradoFormRequest;
use DB;

class GradoController extends Controller
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
    		$grados = DB::table('grado')->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('idgrado','desc')
    		->paginate(7);
    		return view('detalle.grado.index',["grados"=>$grados,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("detalle.grado.create");
    }

    public function store( GradoFormRequest $request)		//Para almacenar
    {
    	$grado = new Grado;
    	$grado -> nombre = $request -> get('nombre');
    	$grado -> estado = 'Activo';
    	$grado -> save();

    	return Redirect::to('detalle/grado');
    }

    public function show($id)		//Para mostrar
    {
    	return view("detalle.grado.show",["grado"=>Grado::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("detalle.grado.edit",["grado"=>Grado::findOrFail($id)]);
    }

    public function update(GradoFormRequest $request, $id)
    {	
    	$grado = Grado::findOrFail($id);
    	$grado -> nombre = $request -> get('nombre');
    	$grado -> estado = 'Activo';
    	$grado -> update();

    	return Redirect::to('detalle/grado');
    }

    public function destroy($id)
    {
    	$grado=Grado::findOrFail($id);
    	$grado -> estado = 'Inactivo';
    	$grado->update();
    	return Redirect::to('detalle/grado');
    }
}
