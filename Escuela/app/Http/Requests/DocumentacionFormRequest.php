<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class DocumentacionFormRequest extends Request
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
            'institucion'=>'required|max:45',
            'tipo'=>'required|max:15',
            'especialidad'=>'required|max:49',
            'copia'=>'mimes:jpeg,bmp,png,jpg',
        ];
    }
}
