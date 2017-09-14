<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\HojaVida;
use Escuela\Maestro;
use Escuela\MaestroTrabajo;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Escuela\Http\Requests\MaestroTrabajoFormRequest;

class MaestroTrabajoController extends Controller
{
    public function edit($id_hoja)
    {
        $usuarioactual=\Auth::user();

        $hoja = HojaVida::findOrFail($id_hoja);
        $dui = $hoja->mdui;

        $maestro = Maestro::where('mdui', $dui)->first();

        return view("docente.trabajos.edit",["hoja"=>$hoja, "maestro"=>$maestro, "usuarioactual"=>$usuarioactual]);
    }

    public function update(MaestroTrabajoFormRequest $request, $id_hoja)
    {   
        $usuarioactual=\Auth::user();

        $trabajo = new MaestroTrabajo();
        $trabajo->id_hoja = $id_hoja;
        $trabajo->cargo = $request->get('cargo');
        $trabajo->lugar = $request->get('lugar');
        $trabajo->tiempo = $request->get('tiempo');

        if(Input::hasFile('copia')){
            $file = Input::file('copia');
            $file -> move(public_path().'/imagenes/maestros/trabajos/', $file->getClientOriginalName());
            $trabajo->copia = $file->getClientOriginalName();
            }

        $trabajo->save();  


        return Redirect::to('docente/cvitae');
    }
}
