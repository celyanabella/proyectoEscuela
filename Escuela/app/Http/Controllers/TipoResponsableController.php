<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\TipoResponsable;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
        $usuarioactual=\Auth::user();

    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$tipos = DB::table('tipo_responsable')->where('nombretipo','LIKE','%'.$query.'%')
    		->orderBy('idresponsable','asc')
    		->paginate(7);
    		return view('datos.tipoResponsable.index',["tipos"=>$tipos,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();

    	return view("datos.tipoResponsable.create",["usuarioactual"=>$usuarioactual]);
    }

    public function store( TipoResponsableFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

    	$tipo = new TipoResponsable;
    	$tipo -> nombretipo = $request -> get('nombretipo');
    	$tipo -> save();

    	return Redirect::to('datos/tipoResponsable');
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();

    	return view("datos.tipoResponsable.show",["tipo"=>TipoResponsable::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {
        $usuarioactual=\Auth::user();

    	return view("datos.tipoResponsable.edit",["tipo"=>TipoResponsable::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function update(TipoResponsableFormRequest $request, $id)
    {	
        $usuarioactual=\Auth::user();

    	$tipo = TipoResponsable::findOrFail($id);
    	$tipo -> nombretipo = $request -> get('nombretipo');
    	$tipo -> update();

    	return Redirect::to('datos/tipoResponsable');
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$tipo=TipoResponsable::findOrFail($id);
    	$tipo->update();

        Session::flash('message', '"'.$tipo->nombretipo.'"'.' fue eliminado de nuestros registros',["usuarioactual"=>$usuarioactual]);

    	return Redirect::to('datos/tipoResponsable');
    }
}
