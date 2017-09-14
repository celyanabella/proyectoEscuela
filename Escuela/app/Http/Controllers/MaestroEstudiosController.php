<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\HojaVida;
use Escuela\Maestro;
use Escuela\MaestroEstudios;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Escuela\Http\Requests\DocumentacionFormRequest;


class MaestroEstudiosController extends Controller
{

    public function edit($id_hoja)
    {
        $usuarioactual=\Auth::user();

        $hoja = HojaVida::findOrFail($id_hoja);
        $dui = $hoja->mdui;

        $maestro = Maestro::where('mdui', $dui)->first();

        return view("docente.estudios.edit",["hoja"=>$hoja, "maestro"=>$maestro, "usuarioactual"=>$usuarioactual]);
    }


     public function update(DocumentacionFormRequest $request, $id_hoja)
    {   
        $usuarioactual=\Auth::user();

        $estudio = new MaestroEstudios();
        $estudio->id_hoja = $id_hoja;
        $estudio->institucion = $request->get('institucion');
        $estudio->tipo = $request->get('tipo');
        $estudio->especialidad = $request->get('especialidad');

        if(Input::hasFile('copia')){
            $file = Input::file('copia');
            $file -> move(public_path().'/imagenes/maestros/estudios/', $file->getClientOriginalName());
            $estudio->copia = $file->getClientOriginalName();
            }

        $estudio->save();  


        return Redirect::to('docente/cvitae');
    }
}





