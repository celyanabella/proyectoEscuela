<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Turno;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\TurnoFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class HojaVidaController extends Controller
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
    		return view('docentes.cvitae.index',["usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
     $usuarioactual=\Auth::user();

    	return view("docentes.cvitae.create",["usuarioactual"=>$usuarioactual]);   
    }

   
}
