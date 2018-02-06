<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;


use Escuela\Materia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Escuela\Http\Requests\MateriaFormRequest;
use DB;



class MateriaController extends Controller
{
    //
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
    		$materias = DB::table('materia')->where('nombre','LIKE','%'.$query.'%')
            ->where('materia.estado','Activo')
    		->orderBy('id_materia','asc')
    		->paginate(9);
    		return view('detalle.materia.index',["materias"=>$materias,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.materia.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( MateriaFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$materia = new Materia;
        $materia -> codigo = $request -> get('codigo');
    	$materia -> nombre = $request -> get('nombre');
    	$materia -> estado = 'Activo';
    	$materia -> save();

    	return Redirect::to('detalle/materia');
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.materia.show",["materia"=>Materia::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.materia.edit",["materia"=>Materia::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function update(MateriaFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();
        
    	$materia = Materia::findOrFail($id);
        $materia -> codigo = $request -> get('codigo');
    	$materia -> nombre = $request -> get('nombre');
    	$materia -> estado = 'Activo';
    	$materia-> update();

    	return Redirect::to('detalle/materia');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$materia=Materia::findOrFail($id);
    	$materia -> estado = 'Inactivo';
    	$materia->update();

        Session::flash('message', '"'.$materia->nombre.'"'.' fue eliminado de nuestros registros');

    	return Redirect::to('detalle/materia');
    }
    
}
