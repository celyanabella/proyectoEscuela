<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\TipoResponsable;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\TipoResponsableFormRequest;
use DB;

class TipoResponsableController extends Controller
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
    		$tipos = DB::table('tipo_responsable')->where('nombretipo','LIKE','%'.$query.'%')
    		->orderBy('idresponsable','desc')
    		->paginate(7);
    		return view('datos.tipoResponsable.index',["tipos"=>$tipos,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("datos.tipoResponsable.create");
    }

    public function store( TipoResponsableFormRequest $request)		//Para almacenar
    {
    	$tipo = new TipoResponsable;
    	$tipo -> nombretipo = $request -> get('nombretipo');
    	$tipo -> save();

    	return Redirect::to('datos/tipoResponsable');
    }

    public function show($id)		//Para mostrar
    {
    	return view("datos.tipoResponsable.show",["tipo"=>TipoResponsable::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("datos.tipoResponsable.edit",["tipo"=>TipoResponsable::findOrFail($id)]);
    }

    public function update(TipoResponsableFormRequest $request, $id)
    {	
    	$tipo = TipoResponsable::findOrFail($id);
    	$tipo -> nombretipo = $request -> get('nombretipo');
    	$tipo -> update();

    	return Redirect::to('datos/tipoResponsable');
    }

    public function destroy($id)
    {
    	$tipo=TipoResponsable::findOrFail($id);
    	$tipo->update();
    	return Redirect::to('datos/tipoResponsable');
    }
}
