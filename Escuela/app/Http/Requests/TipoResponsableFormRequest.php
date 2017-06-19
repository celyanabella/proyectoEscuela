<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class TipoResponsableFormRequest extends Request
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
            'nombretipo'=>'required|max:50',    //nombre del formulario no de la base
        ];
    }
}
