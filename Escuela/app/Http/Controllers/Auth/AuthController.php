<?php

namespace Escuela\Http\Controllers\Auth;
use Escuela\User;
use Validator;
use Escuela\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
use Escuela\TipoUsuario;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("login");
    }


       

        public function postLogin(Request $request)
   {
    $this->validate($request, [
        'name' => 'required',
        'password' => 'required',
    ]);



    $credentials = $request->only('name', 'password');



    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
    
       $usuarioactual=\Auth::user();

       if($usuarioactual->tipoUsuario==1){// SI EL USUARIO ES ADMIN MUESTRA EL VIEW DE ADMIN
      
       return view('/layouts/admin')->with("usuarioactual",  $usuarioactual);
       }
    else
        return view('layouts/standar')->with("usuarioactual", $usuarioactual);// SI EL USUARIO ES DIFERENTE A 1 MUSTRA POR LE MOMENTO USUARIO STANDAR
       //CAMBIAR RUTA A LA FUNCIONAL
    }

    return "credenciales incorrectas";

    }


//login

 //registro   


        protected function getRegister()
    {
       $usuarioactual=\Auth::user();
       return view("registro")->with("usuarioactual",  $usuarioactual);
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'tipoUsuario' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);
    $user->tipoUsuario=$data['tipoUsuario'];
    
    if($user->save()){

         return "se ha registrado correctamente el usuario";
               
    }
   

   

}
public function tregistro()
    {
        

        $tiposusuario=TipoUsuario::all();
        return view('registro')->with("tiposusuario",$tiposusuario);
        
    }

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }






}
