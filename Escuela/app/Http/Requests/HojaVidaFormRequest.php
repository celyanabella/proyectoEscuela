<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class HojaVidaFormRequest extends Request
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

            //Hoja de Vida
            'cenombrado'=>'max:250',
            'codigoinstitucion'=>'max:250',
            'aniosservicio'=>'max:2',
            'cargo'=>'max:99',
            'funciones'=>'max:1020',
            'nacimientoextranjero'=>'max:45',


            //Maestro
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'fechanacimiento'=>'required',
            'sexo'=>'required',
            'direccion'=>'required|max:1020',
            'mdui'=>'min:9|max:9',
            'nit'=>'min:14|max:14',
            'fotografia'=>'mimes:jpeg,bmp,png,jpg'

        ];
    }
}
