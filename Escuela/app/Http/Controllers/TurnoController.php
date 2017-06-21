<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Turno;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\TurnoFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class TurnoController extends Controller
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
    		$turnos = DB::table('turno')->where('nombre','LIKE','%'.$query.'%')
            ->where('turno.estado','Activo')
    		->orderBy('idturno','asc')
    		->paginate(7);
    		return view('detalle.turno.index',["turnos"=>$turnos,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();

    	return view("detalle.turno.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( TurnoFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$turno = new Turno;
    	$turno -> nombre = $request -> get('nombre');
    	$turno -> estado = 'Activo';
    	$turno -> save();

    	return Redirect::to('detalle/turno',["usuarioactual"=>$usuarioactual]);
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();

    	return view("detalle.turno.show",["turno"=>Turno::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();

    	return view("detalle.turno.edit",["turno"=>Turno::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function update(TurnoFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();

    	$turno = Turno::findOrFail($id);
    	$turno -> nombre = $request -> get('nombre');
    	$turno -> estado = 'Activo';
    	$turno -> update();

    	return Redirect::to('detalle/turno');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$turno=Turno::findOrFail($id);
    	$turno -> estado = 'Inactivo';
    	$turno->update();

        Session::flash('message', '"'.$turno->nombre.'"'.' fue eliminado de nuestros registros');

    	return Redirect::to('detalle/turno');
    }
}
