<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Turno;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\TurnoFormRequest;
use DB;

class TurnoController extends Controller
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
    		$turnos = DB::table('turno')->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('idturno','desc')
    		->paginate(7);
    		return view('detalle.turno.index',["turnos"=>$turnos,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("detalle.turno.create");
    }

    public function store( TurnoFormRequest $request)		//Para almacenar
    {
    	$turno = new Turno;
    	$turno -> nombre = $request -> get('nombre');
    	$turno -> estado = 'Activo';
    	$turno -> save();

    	return Redirect::to('detalle/turno');
    }

    public function show($id)		//Para mostrar
    {
    	return view("detalle.turno.show",["turno"=>Turno::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("detalle.turno.edit",["turno"=>Turno::findOrFail($id)]);
    }

    public function update(TurnoFormRequest $request, $id)
    {	
    	$turno = Turno::findOrFail($id);
    	$turno -> nombre = $request -> get('nombre');
    	$turno -> estado = 'Activo';
    	$turno -> update();

    	return Redirect::to('detalle/turno');
    }

    public function destroy($id)
    {
    	$turno=Turno::findOrFail($id);
    	$turno -> estado = 'Inactivo';
    	$turno->update();
    	return Redirect::to('detalle/turno');
    }
}
