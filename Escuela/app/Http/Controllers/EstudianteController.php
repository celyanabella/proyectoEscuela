<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;
use Escuela\DetalleGrado;
use Escuela\Estudiante;
use Escuela\Turno;
use Escuela\Seccion;
use Escuela\Grado;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\EstudianteFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class EstudianteController extends Controller
{
     public function __construct()	//para validar
    {
        #$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
            $usuarioactual=\Auth::user();
            //los query capturan los criterios de busqueda que son enviados desde el search.blade de estudiante
            
           
            $query3 = trim($request->get('idanio'));
            if ($query3==null) {
                //valor por defecto, es el año actual
                $query3='2017';
            }
            #$query4 = $request->get('fechamatricula');
            $query5 = $request->get('idgrado');
            $query6 = $request->get('idseccion');
            $query7 = $request->get('idturno');

             //catalogo de años
            $anioDefecto=DB::table('anios')
            ->orderBy('valor', 'desc')
            ->get();

            //catalogos de grados,secciones y turnos
            $grados = DB::table('grado')
            ->orderBy('idgrado','asc')
            ->get();
            $secciones = DB::table('seccion')
            ->orderBy('idseccion','asc')
            ->get();
            $turnos = DB::table('turno')
            ->orderBy('idturno','asc')
            ->get();

        //verifica si la combinacion de grado, turno y seccion existen
        $consulta2=DetalleGrado::where('idgrado', $query5)->where('idseccion', $query6)->where('idturno', $query7)->first();
        if ($consulta2==null) {
            return view("datos.Estudiante.show",["secciones"=>$secciones, "turnos"=>$turnos,"usuarioactual"=>$usuarioactual,"grados"=>$grados,"anios"=>$anioDefecto]);
        }
          
          //la consulta es guardada en la variable $est recordar que join
          //genera una nueva tabla con todos las columnas especificada en el select
            $est = DB::table('estudiante')
            ->select('estudiante.nombre','estudiante.apellido','estudiante.nie','matricula.nie','grado.nombre as nombreGrado'
            ,'seccion.nombre as nombreSeccion','turno.nombre as nombreTurno','matricula.fechamatricula')
            ->join('matricula as matricula','estudiante.nie','=','matricula.nie','full outer')
            ->join('detalle_grado as detalle_grado','matricula.iddetallegrado','=','detalle_grado.iddetallegrado','full outer')
            ->join('grado as grado','detalle_grado.idgrado','=','grado.idgrado','full outer')
            ->join('seccion as seccion','detalle_grado.idseccion','=','seccion.idseccion','full outer')
            ->join('turno as turno','detalle_grado.idturno','=','turno.idturno','full outer')

               ->Where('seccion.idseccion','=',$query6)
               ->Where('grado.idgrado','=',$query5)
               ->Where('turno.idturno','=',$query7)
               ->whereYear('matricula.fechamatricula','=',$query3)
               ->orderby('estudiante.apellido','asc')
                ->get();
             
            if ($est==null) {

                $nGrado=Grado::where('idgrado','=',$query5)->first();
                $nTurno=Turno::where('idturno','=',$query7)->first();
                $nSeccion=Seccion::where('idseccion','=',$query6)->first();

                Session::flash('M1',"opss! no tenemos resultados con el grado ".$nGrado->nombre."  ".$nSeccion->nombre."  ".$nTurno->nombre);
                return view("datos.Estudiante.show",["secciones"=>$secciones, "turnos"=>$turnos,"usuarioactual"=>$usuarioactual,"grados"=>$grados,"anios"=>$anioDefecto]);
    
            }
            
            //se retorna el array de resultados a la vista en una variable "estudiantes" y ademas los catalogos de turno,seccion y grado
            return view('datos.Estudiante.index',["estudiantes"=>$est,"anios"=>$anioDefecto, "grados"=>$grados,"searchYear"=>$query3, "secciones"=>$secciones, "turnos"=>$turnos,"usuarioactual"=>$usuarioactual
            ,"seccion"=>$query6,"grado"=>$query5,"turno"=>$query7]);

    	}
    	

    }

    public function create()
    {
   
    }

    public function store( EstudianteFormRequest $request)		//Para almacenar
    {
  
    }

    public function show($id)		//Para mostrar
    {
    	return view("datos.Estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
    }

    public function edit($id)
    {
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')->get();
    	$secciones = DB::table('seccion')->get();
    	$turnos = DB::table('turno')->get();

        

        return view("datos.Estudiante.edit",["estudiante"=>Estudiante::findOrFail($id), "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos]);
    }
    
    
    
#AUN QUEDA POR RESOLVER EL CONTROL DEL ESTUDIANTEFORMREQUEST
    public function update(Request $request, $id)
    {	
        $estudiante = Estudiante::findOrFail($id);
        $estudiante-> nombre = $request->get('nombre');
        $estudiante-> apellido = $request->get('apellido');
       #$estudiante-> nie = $request->get('nie');
        $estudiante-> fechadenacimiento = $request->get('fechadenacimiento');
        $estudiante-> domicilio = $request->get('domicilio');
        $estudiante-> enfermedad = $request->get('enfermedad');

        if ($request->get('zonaurbana')==1) {
            $estudiante-> zonaurbana = true;
        } else {
            $estudiante-> zonaurbana = false;
        }
        
        
        $estudiante-> sexo = $request->get('sexo');

        if ($request->get('discapacidad')==1) {
            $estudiante-> discapacidad = true;
        } else {
            $estudiante-> discapacidad = false;
        }
        
        
        if ($request->get('autorizavacuna')==1) {
           $estudiante-> autorizavacuna = true;
        } else {
            $estudiante-> autorizavacuna = false;
        }
        
        
        $estudiante-> estado = true;
        $estudiante->update();
        //se redirecciona al perfil actual del estudiante
        return Redirect::to('datos/Estudiante/'.$id);
    }

    public function destroy($id)
    {

    }
}
