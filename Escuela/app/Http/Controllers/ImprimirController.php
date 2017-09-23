<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;
use Escuela\User;
use Escuela\TipoUsuario;


class ImprimirController extends Controller
{

	public function index()
	{
		 $usuarioactual=\Auth::user();
		return view('/imprimir/imprimir')->with('usuarioactual',  $usuarioactual);
	}
}
