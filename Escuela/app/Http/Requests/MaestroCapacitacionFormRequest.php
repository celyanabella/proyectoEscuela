<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class MaestroCapacitacionFormRequest extends Request
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
            'nombre'=>'required|max:45',
            'horas'=>'required|max:4',
            'anio'=>'required|max:4',
            'copia'=>'mimes:jpeg,bmp,png,jpg',
        ];
    }
}
