
<?php
use Escuela\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;







//GRUPO DE URL DE USUARIO SIN LOGEARSE
Route::group(['middleware' => 'guest'], function () {
  
  Route::get('/', 'Auth\AuthController@getLogin');
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
 
 /*DESCOMENTAR ESTE GRUPO DE RUTAS CUANDO SE QUIERA AGREAGAR EL PRIMER USUARIO EN LA BASE DE DATOS*/
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('register', 'Auth\AuthController@tregistro'); 
    Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

});







//GRUPO DE URLS LOGEADOS 

Route::group(['middleware' => 'auth'], function () {
	  Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::resource('datos/Estudiante','EstudianteController');         //Estudiantes
    Route::resource('expediente/matricula','MatriculaController');     //Nuevo Ingreso
    Route::resource('expediente/matricula2','Matricula2Controller');  //Antiguo Ingreso 
    
    Route::get('reporte','ReporteController@index');                  //Reportes
    Route::post('recuperandoDatos','ReporteController@store');        //Reportes

});










//grupo de rutas de usuario administrador
   
Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', ['as' => 'form_nuevo_usuario', 'uses' => 'UsuariosController@form_nuevo_usuario']);
      Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario','UsuariosController@agregar_detalle');
      Route::get('listado_usuarios/{page?}', ['as' => 'listado_usuarios/{page?}', 'uses' => 'UsuariosController@listado_usuarios']);
      Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    /*Route::post('editar_usuario', 'UsuariosController@editar_usuario');*/




     //COLOCAR SUS RUTAS ACA PARA USUARIO ADMIN

Route::resource('datos/tipoResponsable','TipoResponsableController');
Route::resource('datos/Responsable','ResponsableController');
#Route::resource('datos/Estudiante','EstudianteController');
Route::resource('detalle/grado','GradoController');
Route::resource('detalle/seccion','SeccionController');
Route::resource('detalle/turno','TurnoController');

//rutas materia
Route::resource('detalle/materia','MateriaController');
Route::resource('detalle/actividad','ActividadController'); //Ruta de gestion de actividades 


//Rutas de Gestion de docentes
Route::resource('docente/cvitae','HojaVidaController');
Route::get('municipios/{id}','HojaVidaController@getMunicipios');
Route::resource('docente/estudios','MaestroEstudiosController');
Route::resource('docente/capacitaciones','MaestroCapacitacionController');
Route::resource('docente/trabajos','MaestroTrabajoController');


Route::resource('asignacion', 'AsignacionController');

Route::resource('asignacion_cupos', 'CupoController');
Route::resource('asignacion_Usuarios', 'AsignacionUserController');

Route::resource('asignacion', 'AsignacionController');




Route::resource('asignacion/materia', 'AsignacionMateriaController');

Route::get('asignacion/{valor}','AsignacionController@show');

Route::resource('imprimir','ImprimirController');

Route::get('matripdf', function() {
  $pdf = PDF::loadView('matricul');
  return $pdf->download('MatriculaInscrpcion.pdf');
});

Route::get('hojavidapdf', function(){
  $pdf = PDF::loadView('hojavid');
  return $pdf->download('HojaVida.pdf');
});

Route::get('libretapdf', function(){
  $pdf = PDF::loadView('libreta')->setPaper('Letter', 'landscape')->setWarnings(false)->save('LibretaNotas.pdf');
  return $pdf->download('LibretaNotas.pdf');
});








      //CREACION DE BOTON ELIMINAR MEDIANTE RUTA 
      Route::delete('eliminar/{id}',  function ($id){
           User::find($id)->delete();
           return redirect('listado_usuarios/{page?}');
      });

      //BOTON EDITAR MEDIANTE RUTA 
      Route::put('editar_usuario/{id}',  function (Request $request, $id){
           $usuario = User::find($id);
           $usuario->name  =   $request->name;
           $usuario->email=  $request->email;
           $usuario->tipoUsuario=  $request->tipoUsuario;
           $usuario->password=  $request->password;
           $usuario->save();

           return redirect('listado_usuarios/{page?}');
      });
      
});



//grupo de rutas para usuario standar

Route::group(['middleware' => 'usuarioStandard'], function () { 
     
  #Route::resource('expediente/matricula','MatriculaController');     //Nuevo Ingreso
  #Route::resource('expediente/matricula2','Matricula2Controller');  //Antiguo Ingreso

  //RUTAS DE USUARIO DOCENTE
  Route::get('userDocente/lista/estudiante/{a1}/{a2}', ['as' => 'lista', 'uses' => 'MaestroUserController@getLista']);
  Route::get('userDocente/trim/notas/{g}/{s}/{t}', ['as' => 'notas', 'uses' => 'MaestroUserController@edit']);
  Route::resource('userDocente/materia','MaestroUserController');  //Materias del docente
  Route::resource('evaluacion', 'EvaluacionController');
  Route::get('eval','EvaluacionController@indice');
 

  //{id_asignacion}{id_asignacion}{nombreGrado}{nombreSeccion}{nombreTurno}{nombreMateria}
  Route::get('userDocente/lista1/estudiante/{a1}/{a2}/{nG}/{nS}/{nT}/{nM}', ['as' => 'lista1', 'uses' => 'EvaluacionController@getLista']);
 // Route::get('userDocente/trim/notas1/{g}/{s}/{t}', ['as' => 'notas', 'uses' => 'EvaluacionController@edit']);
});








