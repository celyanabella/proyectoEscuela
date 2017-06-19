<?php

namespace Escuela\Http\Middleware;

use Escuela\User;
use Escuela\TipoUsuario;
use Closure;

class MDusuarioadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
        
        $usuarioactual=\Auth::user();
      

        if($usuarioactual->tipoUsuario!=1){
         return view("mensajes.msj_rechazado")->with("msj","No tiene suficientes Privilegios para acceder a esta seccion");

        }
        return $next($request);
    
    }
}
