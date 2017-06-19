<?php 

namespace Escuela\Http\Controllers;

use Escuela\User;
use Storage;
use Illuminate\Http\Request;
use Escuela\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Escuela\TipoUsuario;
use Escuela\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;



class UsuariosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
   public function __construct()
	{
		$this->middleware('auth');
	}


   public function form_nuevo_usuario()
	{
        
        $usuarioactual=\Auth::user();
        $tiposusuario=TipoUsuario::all();
		return view('formularios.form_nuevo_usuario')->with("tiposusuario",$tiposusuario)->with("usuarioactual", $usuarioactual );  
		
	}


	public function listado_usuarios()
    {
        $usuarioactual=\Auth::user();
        $tipousuario=TipoUsuario::all();
        $usuarios= User::paginate(20);  
        return view('listados.listado_usuarios')
        ->with("usuarios", $usuarios )
        ->with("usuarioactual", $usuarioactual )->with("tiposusuario",$tipousuario);     
	}


	//presenta el formulario para nuevo usuario
	public function agregar_nuevo_usuario(Request $request)
	{
        
        $data=$request->all();


        $reglas = array(
        	             'name' => 'required|Unique:users',
        	             'email' => 'required|Email|Unique:users',
        	             'tipoUsuario' => 'required|Numeric|min:1|max:2',
        	            );
        $mensajes= array(
        	             'name.required' =>  'Ingresar Nombres es obligatorio',
        	             'name.unique' =>  'Ya existe el Usuario, favor ingresar otro nombre',
        	             'email.required' =>  'Ingresar un email es obligatorio',
        	             'email.email' =>  'el email debe tener un formato valido',
        	             'email.unique' =>  'el email debe ser unico en la base de datos',
        	             
        	             'tipoUsuario.numeric' =>  'Ingresar un tipo de usuario valido',
        	             );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
        {
			 $errores = $validacion->errors(); 
			 return new JsonResponse($errores, 422); 
	         /*return view("mensajes.msj_rechazado")->with("msj","Existen errores de validación")
			                                      ->with("errors",$errores);*/ 			          
        }



      	$usuario= new User;
		$usuario->name  =  $data['name'];
		$usuario->email=$data['email'];
        $usuario->tipoUsuario=$data['tipoUsuario'];
		$usuario->password=bcrypt($data['password']);

		$resul= $usuario->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}

 
	public function form_editar_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuarioactual=\Auth::user();
		$usuario=User::find($id);
		$contador=count($usuario);
		$tiposusuario=TipoUsuario::all();
		
		if($contador>0){          
            return view("formularios.editar_usuario")
                   ->with("usuarioactual", $usuarioactual )
                   ->with("usuario",$usuario)
                   ->with("tiposusuario",$tiposusuario);   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}

   

		/*public function editar_usuario(Request $request)
	{



      
        $data=$request->all();
        $reglas = array('name' => 'required|Unique:users',
        	             'email' => 'required|Email|Unique:users',
        	             'tipoUsuario' => 'required|Numeric|min:1|max:2',
        	            );
        $mensajes= array('name.required' =>  'Ingresar Nombres es obligatorio',
        	             'name.unique' =>  'Ya existe el Usuario, favor ingresar otro nombre',
        	             'email.required' =>  'Ingresar un email es obligatorio',
        	             'email.email' =>  'el email debe tener un formato valido',
        	             'email.unique' =>  'el email debe ser unico en la base de datos',
        	             
        	             'tipoUsuario.numeric' =>  'Ingresar un tipo de usuario valido',
        	             );
        

      
        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
        {
			 
			 $errores = $validacion->errors();  
	         return view("mensajes.msj_rechazado")->with("msj","Existen errores de validación")
			                                      ->with("errores",$errores); 			          
        }
        /*$usuario = user::find($id);
    	$usuario -> nombreGrado = $request -> get('nombre');
    	$grado -> estado = 'Activo';
    	$grado -> update();

    	return Redirect::to('detalle/grado');

		
		$usuario=User::find($idUsuario);
        $usuario->name  =  get('name');
		$usuario->email= get('email');
        $usuario->tipoUsuario= get('tipoUsuario');
		$usuario->password= bcrypt(get('password'));
		
		$resul= $usuario->update();

        $usuario=User::find($idUsuario);
        $usuario->name  =   $request->get('name');
		$usuario->email=  $request->get('email');
        $usuario->tipoUsuario=  $request->get('tipoUsuario');
		$usuario->password=  $request->bcrypt(get('password'));
  		$resul= $usuario->update();
		   $usuario = User::find($id);
           $usuario->name  =   $request->name;
           $usuario->email=  $request->email;
           $usuario->tipoUsuario=  $request->tipoUsuario;
           $usuario->password=  $request->password;
           $usuario->save();


		if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}


	/*	public function subir_imagen_usuario(Request $request)
	{

	    $id=$request->input('id_usuario_foto');
		$archivo = $request->file('archivo');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

	        $nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre="userimagen-".$id.".".$extension;
		    $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
		    $rutadelaimagen="storage/fotografias/".$nuevo_nombre;
	    
		    if ($r1){

			    $usuario=User::find($id);
			    $usuario->imagenurl=$rutadelaimagen;
			    $r2=$usuario->save();
		        return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
		    }
		    else
		    {
		    	return view("mensajes.msj_rechazado")->with("msj","no se cargo la imagen");
		    }

        }	

	}
    

	public function cambiar_password(Request $request){
        $email=$request->input("email_usuario");
        $usuariactual=\Auth::user();
        
        if($usuariactual->email != $email ){
		
		$reglas = array('email_usuario' => 'required|Email|Unique:users,email');
		$mensajes = array('email_usuario.unique' => 'El email ingresado ya esta en uso en la base de datos');
      $this->validate($request,$reglas, $mensajes);
           
         }

       

		$id=$request->input("id_usuario_password");
		$email=$request->input("email_usuario");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
	    $usuario->email=$email;
	    $usuario->password=bcrypt($password);
	    $r=$usuario->save();

	    if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
	    }
	    else
	    {
	    	return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
	    }
	}



	public function form_cargar_datos_usuarios(){
       return view("formularios.form_cargar_datos_usuarios");
	}







   


      	public function info_datos_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		$tiposusuario=TipoUsuario::all();
       
		
		if($contador>0){          
            return view("standard.info_datos_usuario")
                   ->with("usuario",$usuario)
                   ->with("tiposusuario",$tiposusuario);
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}



	public function mostrar_errores(){
      
       return view("mensajes.msj_rechazado")->with("msj","Existen errores de validacion");

	}*/







}