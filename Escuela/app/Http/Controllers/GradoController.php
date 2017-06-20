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
        $usuarioactual=\Auth::user();

    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$grados = DB::table('grado')->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('idgrado','desc')
    		->paginate(7);
    		return view('detalle.grado.index',["grados"=>$grados,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.grado.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( GradoFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$grado = new Grado;
    	$grado -> nombre = $request -> get('nombre');
    	$grado -> estado = 'Activo';
    	$grado -> save();

    	return Redirect::to('detalle/grado');
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.grado.show",["grado"=>Grado::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.grado.edit",["grado"=>Grado::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function update(GradoFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();
        
    	$grado = Grado::findOrFail($id);
    	$grado -> nombre = $request -> get('nombre');
    	$grado -> estado = 'Activo';
    	$grado -> update();

    	return Redirect::to('detalle/grado');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$grado=Grado::findOrFail($id);
    	$grado -> estado = 'Inactivo';
    	$grado->update();
    	return Redirect::to('detalle/grado');
    }
}
