<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class MaestroTrabajoFormRequest extends Request
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
            'cargo'=>'required|max:99',
            'lugar'=>'required|max:250',
            'tiempo'=>'required|max:25',
            'copia'=>'mimes:jpeg,bmp,png,jpg',
        ];
    }
}
