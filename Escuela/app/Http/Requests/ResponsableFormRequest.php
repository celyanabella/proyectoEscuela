<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class ResponsableFormRequest extends Request
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
            'idresponsable'=>'required',    #Tipo Responsable 
            'nie'=>'required',
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'ocupacion'=>'required|max:50',
            'lugardetrabajo'=>'required|max:200',
            'telefono'=>'max:8',
            'dui'=>'max:10'
        ];
    }
}
