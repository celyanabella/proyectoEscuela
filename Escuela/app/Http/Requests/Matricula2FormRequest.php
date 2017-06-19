<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class Matricula2FormRequest extends Request
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //Matricula
            'fechamatricula'=>'required',
            'fotografia'=>'mimes:jpeg,bmp,png,jpg',
            'cePrevio'=>'required|max:100',

            //PartidaNacimiento
            'folio'=>'required|min:1|max:8',
            'libro'=>'required|min:1|max:8',

            //Estudiante
            #'nie'=>'required|min:8|max:8',
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'fechadenacimiento'=>'required',
            'sexo'=>'required',
            'domicilio'=>'required|max:50',
            'enfermedad'=>'max:4096',
            'zonahabitacion'=>'required',
            'autorizavacuna'=>'required',
            'discapacidad'=>'required',

            //Madre
            'nombre2'=>'max:50',
            'apellido2'=>'max:50',
            'ocupacion'=>'max:50',
            'lugardetrabajo'=>'max:50',
            'dui'=>'min:10|max:10',            //Unique
            'telefono'=>'min:8|max:8',

            //Padre
            'nombre3'=>'max:50',
            'apellido3'=>'max:50',
            'ocupacion3'=>'max:50',
            'lugardetrabajo3'=>'max:50',
            'dui3'=>'min:10|max:10',            //Unique
            'telefono3'=>'min:8|max:8',

            //Contacto de Emergencia
            'nombre4'=>'required|max:50',
            'apellido4'=>'required|max:50',
            'telefono4'=>'required|min:8|max:8'



        ];
    }
}
