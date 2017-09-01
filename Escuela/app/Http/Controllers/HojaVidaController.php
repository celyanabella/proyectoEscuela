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

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


use Escuela\Http\Requests\HojaVidaFormRequest;

use Escuela\Http\Requests\Matricula2FormRequest;
use Escuela\Http\Requests\DetalleParienteFormRequest;
use Escuela\Http\Requests\ResponsableFormRequest;

use Escuela\Http\Requests\TipoResponsableFormRequest;
use Escuela\Http\Requests\GradoFormRequest;
use Escuela\Http\Requests\DetalleGradoFormRequest;
use Escuela\Http\Requests\SeccionFormRequest;
use Escuela\Http\Requests\TurnoFormRequest;

#use Escuela\Http\Requests\EstudianteFormRequest;
#use Escuela\Http\Requests\PartidaNacimientoFormFormRequest;

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

    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();

    	if($request)
    	{
            $query = trim($request->get('searchText'));
            $hojas = DB::table('hojadevida as ho')
            ->join('maestro as ma','ho.mdui','=','ma.mdui')
            ->select('ma.nombre','ma.apellido','ma.fotografia','ma.direccion', 'ma.mdui', 'ma.fechanacimiento')
            ->groupBy('ma.nombre','ma.apellido','ma.fotografia','ma.direccion', 'ma.mdui', 'ma.fechanacimiento')
            ->where('ma.apellido','LIKE','%'.$query.'%')
            ->where('ma.estado','=','Activo')
            ->orderBy('ma.id','desc')
            ->paginate(7);
            #->get();
    		return view('docente.cvitae.index',["hojas"=>$hojas,"searchText"=>$query,"usuarioactual"=>$usuarioactual]); 
    	}

    }

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
                $file -> move(public_path().'/imagenes/maestros/', $file->getClientOriginalName());
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
                $hoja->fechaingresopublico=$request->get('fechaingresopublico');
                $hoja->fechalaboral=$request->get('fechalaboral');
                $hoja->ultimoascenso=$request->get('ultimoascenso');
                $hoja->aniosservicio=$request->get('aniosservicio');
                $hoja->proximoascenso=$request->get('proximoascenso');
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

   
}
