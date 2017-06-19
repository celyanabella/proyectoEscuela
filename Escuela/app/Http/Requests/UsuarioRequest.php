<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;
use Redirect;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
      * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
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
                         'name' => 'required|Unique:users',
                         'email' => 'required|Email|Unique:users',
                         'tipoUsuario' => 'required|Numeric|min:1|max:2',
              ];
    }


       public function messages()
    {
        return [
                         'name.required' =>  'Ingresar Nombres es obligatorio',
                         'name.unique' =>  'Ya existe el Usuario, favor ingresar otro nombre',
                         'email.required' =>  'Ingresar un email es obligatorio',
                         'email.email' =>  'el email debe tener un formato valido',
                         'email.unique' =>  'el email debe ser unico en la base de datos',
                         
                         'tipoUsuario.numeric' =>  'Ingresar un tipo de usuario valido',
          
               ];
    }



     /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     
    public function response(array $errors)
    {
        
        return Redirect::to("/mostrar_errores")
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
    */







}
