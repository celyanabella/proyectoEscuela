<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\HojaVida;
use Escuela\Maestro;
use Escuela\MaestroCapacitacion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Escuela\Http\Requests\MaestroCapacitacionFormRequest;

class MaestroCapacitacionController extends Controller
{
    public function edit($id_hoja)
    {
        $usuarioactual=\Auth::user();

        $hoja = HojaVida::findOrFail($id_hoja);
        $dui = $hoja->mdui;

        $maestro = Maestro::where('mdui', $dui)->first();

        return view("docente.capacitaciones.edit",["hoja"=>$hoja, "maestro"=>$maestro, "usuarioactual"=>$usuarioactual]);
    }

    public function update(MaestroCapacitacionFormRequest $request, $id_hoja)
    {   
        $usuarioactual=\Auth::user();

        $capacitacion = new MaestroCapacitacion();
        $capacitacion->id_hoja = $id_hoja;
        $capacitacion->nombre = $request->get('nombre');
        $capacitacion->anio = $request->get('anio');
        $capacitacion->horas = $request->get('horas');

        if(Input::hasFile('copia')){
            $file = Input::file('copia');
            $file -> move(public_path().'/imagenes/maestros/capacitaciones/', $file->getClientOriginalName());
            $capacitacion->copia = $file->getClientOriginalName();
            }

        $capacitacion->save();  


        return Redirect::to('docente/cvitae');
    }
}
