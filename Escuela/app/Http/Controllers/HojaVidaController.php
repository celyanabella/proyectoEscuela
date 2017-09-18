<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\EstadoCivil;
use Escuela\Nivel;
use Escuela\Categoria;
use Escuela\Clase;
use Escuela\Municipio;
use Escuela\Departamento;
use Escuela\Maestro;
use Escuela\HojaVida;
use Escuela\MaestroEstudios;
use Escuela\MaestroCapacitacion;
use Escuela\MaestroTrabajo;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


use Escuela\Http\Requests\HojaVidaFormRequest;
use Escuela\Http\Requests\HojaVida2FormRequest;


use DB;


use Carbon\Carbon; //Para la zona fecha horaria
use Response;
use Illuminate\Support\Collection;  //Contienen los metodos a utilizar
use Illuminate\Database\Connection;


class HojaVidaController extends Controller
{
    
     public function __construct()	//para validar
    {
    }


    /*
        Nombre Funcion: index

        Objetivo: muestra el registro de docentes 
                  y diferentes opciones para el usuario

        Fecha de creación:
        29/08/2017

        Autor: SM11077

        Fecha de última modificación:
        14/09/2017
    */
    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();

    	if($request)
    	{
            $query = trim($request->get('searchText'));
            $hojas = DB::table('hojadevida as ho')
            ->join('maestro as ma','ho.mdui','=','ma.mdui')
            ->select('ma.nombre','ma.apellido','ma.fotografia','ma.direccion', 'ma.mdui', 'ma.fechanacimiento', 'ho.cargo','ho.id_hoja')
            ->groupBy('ma.nombre','ma.apellido','ma.fotografia','ma.direccion', 'ma.mdui', 'ma.fechanacimiento', 'ho.cargo','ho.id_hoja')
            ->where('ma.apellido','LIKE','%'.$query.'%')
            ->where('ho.estado','Activo')
            ->orderBy('ma.id','desc')
            ->paginate(9);
    		return view('docente.cvitae.index',["hojas"=>$hojas,"searchText"=>$query,"usuarioactual"=>$usuarioactual]); 
    	}

    }


    /*
        Nombre Funcion: create

        Objetivo: muestra el formulario de Hoja de Vida
                  con los respectivos catalogos a utilizar 
                  en la plantilla.

        Fecha de creación:
        30/08/2017

        Autor: SM11077

        Fecha de última modificación:
        06/09/2017
    */
    public function create()
    {
     $usuarioactual=\Auth::user();

        $tipos = EstadoCivil::orderBy('estadocivil.id_estado','asc');   //Estado Civil
        $niveles = Nivel::orderBy('nivel.id_nivel','asc');
        $categorias = Categoria::orderBy('categoria.id_categoria','asc');
        $clases = Clase::orderBy('clase.id_clase','asc');
        $municipios = Municipio::orderBy('municipio.id_municipio','asc');
        $departamentos = Departamento::orderBy('departamento.id_departamento','asc');

    	return view("docente.cvitae.create",["tipos"=>$tipos, "niveles"=>$niveles, "categorias"=>$categorias, "clases"=>$clases, "municipios"=>$municipios, "departamentos"=>$departamentos, "usuarioactual"=>$usuarioactual]);   
    }




    /*
        Nombre Funcion: store

        Objetivo: recibe y guarda los datos del 
                  formulario Hoja de Vida

        Fecha de creación:
        30/08/2017

        Autor: SM11077

        Fecha de última modificación:
        06/09/2017
    */

     public function store (HojaVidaFormRequest $request)
    {
        $usuarioactual=\Auth::user();


        //try{
               // DB::beginTransaction();

                //Se hace la fk a la tabla maestro

                $maestro = new Maestro;
                $maestro->mdui = $request -> get('mdui');    //PK
                $maestro->id_estado = $request->get('id_estado');
                $maestro->nombre = $request -> get('nombre');
                $maestro->apellido = $request -> get('apellido');
                $maestro->fechanacimiento = $request -> get('fechanacimiento');
                $maestro->direccion = $request -> get('direccion');
                $maestro->telefono = $request -> get('telefono');

                //Sexo del estudiante
                $vt1 = $request->get('sexo');
                if ($vt1==0) {
                    $maestro->sexo = 'F';
                }
                else{
                    $maestro->sexo = 'M';
                }

                $maestro->afp = $request -> get('afp');
                $maestro->nip = $request -> get('nip');
                $maestro->nit = $request -> get('nit');
                $maestro->inpep = $request -> get('inpep');
                $maestro->extendido = $request -> get('extendido');

                if(Input::hasFile('fotografia')){
                $file = Input::file('fotografia');
                $file -> move(public_path().'/imagenes/maestros/fotos/', $file->getClientOriginalName());
                $maestro->fotografia = $file->getClientOriginalName();
                }
                
                $maestro ->estado = 'Activo';
                $maestro -> save();



                $hoja = new HojaVida;
                $hoja->id_departamento=$request->get('id_departamento');
                $hoja->id_clase=$request->get('id_clase');
                $hoja->id_categoria=$request->get('id_categoria');
                $hoja->id_nivel=$request->get('id_nivel');
                $hoja->mdui = $maestro->mdui;

                $hoja->cenombrado=$request->get('cenombrado');
                $hoja->codigoinstitucion=$request->get('codigoinstitucion');

                $fechaingresopublico = $request->get('fechaingresopublico');
                if ($fechaingresopublico !="") {
                    $hoja->fechaingresopublico=$request->get('fechaingresopublico');
                }

                $fechalaboral = $request->get('fechalaboral');
                if ($fechalaboral !="") {
                    $hoja->fechalaboral=$request->get('fechalaboral');
                }

                $ultimoascenso = $request->get('ultimoascenso');
                if ($ultimoascenso !="") {
                    $hoja->ultimoascenso=$request->get('ultimoascenso');
                }
                
                $proximoascenso = $request->get('proximoascenso');
                if ($proximoascenso !="") {
                    $hoja->proximoascenso=$request->get('proximoascenso');
                }

                $var = $request->get('aniosservicio');
                if($var !=""){
                    $hoja->aniosservicio=$request->get('aniosservicio');
                }

                $hoja->cargo=$request->get('cargo');
                $hoja->funciones=$request->get('funciones');
                $hoja->nacimientoextranjero=$request->get('nacimientoextranjero');
                $hoja->estado='Activo';
                $hoja->save();

               
      //      DB::commit();

      //  } catch(\Exception $e)
      //  {
        //  DB::rollback();
       // }           

        return Redirect::to('docente/cvitae');
    }


    /*
        Nombre Funcion: show

        Objetivo: muestra el detalle de la hoja de vida

        Fecha de creación:
        11/09/2017

        Autor: SM11077

        Fecha de última modificación:
        12/09/2017
    */

    public function show($id_hoja)       //Para mostrar
    {
        $usuarioactual=\Auth::user();

        //Se busca la hoja seleccionada
        $hoja = HojaVida::findOrFail($id_hoja);

        //Se busca el docente
        $dui = $hoja->mdui;
        $maestro = Maestro::where('mdui', $dui)->first();

        //Se busca el estado civil del docente
        $id_estado = $maestro->id_estado;
        $estado = EstadoCivil::where('id_estado', $id_estado)->first();

        //Se Busca la clase del docente
        $id_clase = $hoja->id_clase;
        $clase = Clase::where('id_clase', $id_clase)->first();

        //Se Busca la categoria del docente
        $id_categoria = $hoja->id_categoria;
        $categoria = Categoria::where('id_categoria', $id_categoria)->first();

        //Se Busca la nivel del docente
        $id_nivel = $hoja->id_nivel;
        $nivel = Nivel::where('id_nivel', $id_nivel)->first();

        //Se Busca los estudios realizados por el docente
        $estudios = MaestroEstudios::where('id_hoja', $id_hoja)->get();

        //Se Busca las capacitaciones realizadas por el docente
        $capacitaciones = MaestroCapacitacion::where('id_hoja', $id_hoja)->get();

        //Se Busca el record laboral del docente
        $trabajos = MaestroTrabajo::where('id_hoja', $id_hoja)->get();

        //Se busca el Depto. y Municipio de Nacimiento
        $depto = Departamento::findOrFail($hoja->id_departamento);
        $mun = Municipio::findOrFail($depto->id_departamento);

        return view("docente.cvitae.show",["hoja"=>$hoja, "maestro"=>$maestro, "estado"=>$estado, "clase"=>$clase, 
            "categoria"=>$categoria, "nivel"=>$nivel, "estudios"=>$estudios, "capacitaciones"=>$capacitaciones, "trabajos"=>$trabajos, "mun"=>$mun, "depto"=>$depto, "usuarioactual"=>$usuarioactual]);
    }




    /*
        Nombre Funcion: edit

        Objetivo: Recibe el id de una hoja de vida y en base a ello
                    obtiene los datos relacionados a la hoja y la envia a 
                    la plantilla.

        Fecha de creación:
        12/09/2017

        Autor: SM11077

        Fecha de última modificación:
        12/09/2017
    */


    public function edit($id_hoja)
    {
        $usuarioactual=\Auth::user();

        //Se busca la hoja seleccionada
        $hoja = HojaVida::findOrFail($id_hoja);

        //Se busca el docente
        $dui = $hoja->mdui;
        $maestro = Maestro::where('mdui', $dui)->first();

        //Se busca el estado civil del docente
        $id_estado = $maestro->id_estado;
        $estado = EstadoCivil::where('id_estado', $id_estado)->first();

        //Se Busca la clase del docente
        $id_clase = $hoja->id_clase;
        $clase = Clase::where('id_clase', $id_clase)->first();

        //Se Busca la categoria del docente
        $id_categoria = $hoja->id_categoria;
        $categoria = Categoria::where('id_categoria', $id_categoria)->first();

        //Se Busca la nivel del docente
        $id_nivel = $hoja->id_nivel;
        $nivel = Nivel::where('id_nivel', $id_nivel)->first();

        //Se trae el catalogo de Estado Civil
        $estados = DB::table('estadocivil')->get();

        //Se trae el catalogo de Estado Civil
        $estados = DB::table('estadocivil')->get();

        //Se trae el catalogo los catalogos necesarios
        $estados = DB::table('estadocivil')->get();   
        $niveles = DB::table('nivel')->get();
        $categorias = DB::table('categoria')->get();
        $clases = DB::table('clase')->get();
        $municipios = DB::table('municipio')->get();
        $departamentos = DB::table('departamento')->get();

        return view("docente.cvitae.edit",["hoja"=>$hoja, "maestro"=>$maestro, "estado"=>$estado, "clase"=>$clase, 
            "categoria"=>$categoria, "nivel"=>$nivel, "estados"=>$estados, "niveles"=>$niveles, "categorias"=>$categorias, "clases"=>$clases, "municipios"=>$municipios, "departamentos"=>$departamentos, "usuarioactual"=>$usuarioactual]);
    }




    /*
        Nombre Funcion: update

        Objetivo: recibe los datos modificados por el usuario 
                    y los actualiza

        Fecha de creación:
        13/09/2017

        Autor: SM11077

        Fecha de última modificación:
        13/09/2017
    */

    public function update(HojaVida2FormRequest $request, $id_hoja)
    {   
        $usuarioactual=\Auth::user();

        //try{
        //    DB::beginTransaction();
                
                //Se busca la hoja seleccionada
                $hoja = HojaVida::findOrFail($id_hoja);

                //Se busca el docente
                $dui = $hoja->mdui;
                $maestro = Maestro::where('mdui', $dui)->first();

                $maestro->mdui = $request -> get('mdui');    //PK
                $maestro->id_estado = $request->get('id_estado');
                $maestro->nombre = $request -> get('nombre');
                $maestro->apellido = $request -> get('apellido');
                $maestro->fechanacimiento = $request -> get('fechanacimiento');
                $maestro->direccion = $request -> get('direccion');
                $maestro->telefono = $request -> get('telefono');

                //Sexo del estudiante
                $vt1 = $request->get('sexo');
                if ($vt1==0) {
                    $maestro->sexo = 'F';
                }
                else{
                    $maestro->sexo = 'M';
                }

                $maestro->afp = $request -> get('afp');
                $maestro->nip = $request -> get('nip');
                $maestro->nit = $request -> get('nit');
                $maestro->inpep = $request -> get('inpep');
                $maestro->extendido = $request -> get('extendido');

                if(Input::hasFile('fotografia')){
                $file = Input::file('fotografia');
                $file -> move(public_path().'/imagenes/maestros/fotos/', $file->getClientOriginalName());
                $maestro->fotografia = $file->getClientOriginalName();
                }
                
                $maestro ->estado = 'Activo';
                $maestro -> update();



                //Se procede a actualizar los datos de la hoja                
                $hoja->id_departamento=$request->get('id_departamento');
                $hoja->id_clase=$request->get('id_clase');
                $hoja->id_categoria=$request->get('id_categoria');
                $hoja->id_nivel=$request->get('id_nivel');
                $hoja->mdui = $maestro->mdui;

                $hoja->cenombrado=$request->get('cenombrado');
                $hoja->codigoinstitucion=$request->get('codigoinstitucion');

                $fechaingresopublico = $request->get('fechaingresopublico');
                if ($fechaingresopublico !="") {
                    $hoja->fechaingresopublico=$request->get('fechaingresopublico');
                }

                $fechalaboral = $request->get('fechalaboral');
                if ($fechalaboral !="") {
                    $hoja->fechalaboral=$request->get('fechalaboral');
                }

                $ultimoascenso = $request->get('ultimoascenso');
                if ($ultimoascenso !="") {
                    $hoja->ultimoascenso=$request->get('ultimoascenso');
                }
                
                $proximoascenso = $request->get('proximoascenso');
                if ($proximoascenso !="") {
                    $hoja->proximoascenso=$request->get('proximoascenso');
                }

                $var = $request->get('aniosservicio');
                if($var !=""){
                    $hoja->aniosservicio=$request->get('aniosservicio');
                }

                $hoja->cargo=$request->get('cargo');
                $hoja->funciones=$request->get('funciones');
                $hoja->nacimientoextranjero=$request->get('nacimientoextranjero');
                $hoja->estado='Activo';
                $hoja->update();

            
        
           // DB::commit();

       // }catch(\Exception $e)
        //{
          //  DB::rollback();
       // }

        return Redirect::to('docente/cvitae');
    }




    /*
        Nombre Funcion: destroy

        Objetivo: recibe el id de una hoja de vida y
                    cambia su estado de Activo a Inactivo

        Fecha de creación:
        13/09/2017

        Autor: SM11077

        Fecha de última modificación:
        13/09/2017
    */


    public function destroy($id_hoja)
    {
        $usuarioactual=\Auth::user();

        $hoja = HojaVida::findOrFail($id_hoja);

        //Se busca el docente
        $dui = $hoja->mdui;
        $maestro = Maestro::where('mdui', $dui)->first();

        $hoja=HojaVida::findOrFail($id_hoja);
        $hoja->estado = 'Inactivo';
        $hoja->update();

        Session::flash('message', '"'.$maestro->nombre.'"'.' fue eliminado de nuestros registros');

        return Redirect::to('docente/cvitae');
    }

   
}
