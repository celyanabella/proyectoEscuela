<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class ActividadFormRequest extends Request
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
            //
        'periodo'=>'required|max:50',
        'porcentaje'=> 'required|Numeric'
            
        ];
    }
}
