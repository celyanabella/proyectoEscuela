<?php
namespace Escuela\Http\Controllers;

use Escuela\Grado;
use Escuela\Seccion;
use Escuela\Turno;
use Escuela\DetalleGrado;
use Escuela\DetalleAsignacion;
use Escuela\Maestro;
use Escuela\Materia;
use Illuminate\Http\Request;
use Escuela\Http\Requests;
use Escuela\Asignacion;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests\AsignacionFormRequest;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Database\Connection;
use Illuminate\Support\Str;
use Log;
use DB;

class AsignacionController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();
        //valor del año colectado de la vista
        $query3 = $request->get('idanio');
        if ($query3==null) {
            //valor por defecto, es el año actual
            $query3='2017';
        }
        //catalogo de años
        $anioDefecto=DB::table('anios')
        ->orderBy('valor', 'desc')
        ->get();
        
        //consulta que envia datos a la vista index en el directorio asignacion como un objeto "asgs"
        $consulta=DB::table('asignacion')
        ->select('asignacion.id_asignacion', 'asignacion.id_detalleasignacion', 'asignacion.id_materia', 'asignacion.mdui', 'asignacion.anioasignacion', 'maestro.nombre', 'maestro.apellido', 'materia.nombre as nombremateria', 'detalle_asignacion.iddetallegrado', 'detalle_grado.iddetallegrado', 'detalle_grado.idgrado', 'detalle_grado.idseccion', 'detalle_grado.idturno', 'turno.nombre as nombreturno', 'seccion.nombre as nombreseccion', 'grado.nombre as nombregrado')
        ->join('maestro as maestro', 'asignacion.mdui', '=', 'maestro.mdui', 'full outer')
        ->join('detalle_asignacion as detalle_asignacion', 'asignacion.id_detalleasignacion', '=', 'detalle_asignacion.id_detalleasignacion', 'full outer')
        ->join('materia as materia', 'asignacion.id_materia', '=', 'materia.id_materia', 'full outer')
        ->join('detalle_grado as detalle_grado', 'detalle_asignacion.iddetallegrado', '=', 'detalle_grado.iddetallegrado', 'full outer')
        ->join('turno as turno', 'detalle_grado.idturno', '=', 'turno.idturno', 'full outer')
        ->join('seccion as seccion', 'detalle_grado.idseccion', '=', 'seccion.idseccion', 'full outer')
        ->join('grado as grado', 'detalle_grado.idgrado', '=', 'grado.idgrado', 'full outer')
        ->Where('asignacion.anioasignacion', '=', $query3)
        ->orderBy('maestro.apellido', 'asc')
        ->get();
        //datos para el modal
        //informacion de maestros
        $consulta1=DB::table('maestro')
        ->orderBy('apellido', 'asc')
        ->get();
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')
        ->orderBy('idgrado', 'asc')
        ->get();
        $secciones = DB::table('seccion')
        ->orderBy('idseccion', 'asc')
        ->get();
        $turnos = DB::table('turno')
        ->orderBy('idturno', 'asc')
        ->get();

        
        return view('asignacion.index', ['usuarioactual'=>$usuarioactual,"asgs"=>$consulta,
        "anios"=>$anioDefecto,"searchYear"=>$query3,"maestros"=>$consulta1,"grados"=>$grados,
        "secciones"=>$secciones,"turnos"=>$turnos,]);
    }
    public function show($ban)
    {
        $usuarioactual=\Auth::user();
        
                
             
                $query3='2017';
                    
        
                //catalogo de años
                $anioDefecto=DB::table('anios')
                ->orderBy('valor', 'desc')
                ->get();
                
                //consulta que envia datos a la vista index en el directorio asignacion como un objeto "asgs"
                $consulta=DB::table('asignacion')
                ->select('asignacion.id_asignacion', 'asignacion.id_detalleasignacion', 'asignacion.id_materia', 'asignacion.mdui', 'asignacion.anioasignacion', 'maestro.nombre',
                'maestro.apellido', 'materia.nombre as nombremateria', 'detalle_asignacion.iddetallegrado', 'detalle_grado.iddetallegrado', 'detalle_grado.idgrado', 'detalle_grado.idseccion',
                'detalle_grado.idturno', 'turno.nombre as nombreturno', 'seccion.nombre as nombreseccion', 'grado.nombre as nombregrado')
                ->join('maestro as maestro', 'asignacion.mdui', '=', 'maestro.mdui', 'full outer')
                ->join('detalle_asignacion as detalle_asignacion', 'asignacion.id_detalleasignacion', '=', 'detalle_asignacion.id_detalleasignacion', 'full outer')
                ->join('materia as materia', 'asignacion.id_materia', '=', 'materia.id_materia', 'full outer')
                ->join('detalle_grado as detalle_grado', 'detalle_asignacion.iddetallegrado', '=', 'detalle_grado.iddetallegrado', 'full outer')
                ->join('turno as turno', 'detalle_grado.idturno', '=', 'turno.idturno', 'full outer')
                ->join('seccion as seccion', 'detalle_grado.idseccion', '=', 'seccion.idseccion', 'full outer')
                ->join('grado as grado', 'detalle_grado.idgrado', '=', 'grado.idgrado', 'full outer')
                ->Where('asignacion.anioasignacion', '=', $query3)
                ->orderBy('maestro.apellido', 'asc')
                ->get();
        
                //datos para el modal
                //informacion de maestros
                $consulta1=DB::table('maestro')
                ->orderBy('apellido', 'asc')
                ->get();
                //catalogos de grados,secciones y turnos
                $grados = DB::table('grado')
                ->orderBy('idgrado', 'asc')
                ->get();
                $secciones = DB::table('seccion')
                ->orderBy('idseccion', 'asc')
                ->get();
                $turnos = DB::table('turno')
                ->orderBy('idturno', 'asc')
                ->get();
               
        
        
                
        
            return view('asignacion.show', ['usuarioactual'=>$usuarioactual,"asgs"=>$consulta,
            "anios"=>$anioDefecto,"searchYear"=>$query3,"maestros"=>$consulta1,"grados"=>$grados,
            "secciones"=>$secciones,"turnos"=>$turnos,"exito"=>$ban]);
    }

    
    public function create()
    {
    }



    public function store(AsignacionFormRequest $request)
    {
        //parametros de busqueda para el detalle_asignacion
        $turnoR=$request->get('idturno');
        $seccionR=$request->get('idseccion');
        $gradoR=$request->get('idgrado');
        $maestroR=$request->get('idmaestro');

        //verifica si la combinacion de grado, turno y seccion existen
        $consulta2=DetalleGrado::where('idgrado', $gradoR)->where('idseccion', $seccionR)->where('idturno', $turnoR)->first();
        if ($consulta2==null) {
            $ban="err";
            return Redirect::to('asignacion/'.$ban);
        }

        //id detalle_grado
        $iddg=$consulta2->iddetallegrado;

        //se verifica el tipo de maestro
        $tm=Maestro::where('mdui',$maestroR)->first();

        //pregunto que grado es
        $ngrado=Grado::where('idgrado',$gradoR)->first();

        //se obtiene el listado de materias
        $materias=Materia::all();
       
        //el maestro es de primer y segundo ciclo
        //if ($tm->tipom==1) {
            $detalleAsignacion = DetalleAsignacion::where('aniodetalleasignacion',$request->get('idanio'))->where('iddetallegrado',$iddg)->first();
            $asignacion=Asignacion::where('mdui',$maestroR)->first();
            //se verifica si existe un registro en detalleasignacion
           
            if(is_null($detalleAsignacion)&&is_null($asignacion))
            {   //no existe el valor en detalle asignacion

                //se guarda una tupla en detalle asignacion
                $detalleAsignacion = new DetalleAsignacion;
                $detalleAsignacion->iddetallegrado=$iddg;
                $detalleAsignacion->aniodetalleasignacion=$request->get('idanio');
                $detalleAsignacion->coordinador='1';
                
              $string=Str::lower($ngrado->nombre);
                
                if($string=='primero'or $string=='segundo'or$string=='tercero')
                {
                    $detalleAsignacion->ciclo='1';
                }
                
                if($string=='cuarto'or $string=='quinto'or$string=='sexto')
                    {
                        $detalleAsignacion->ciclo='2';
                    }
                    
                    if($string=='septimo'or $string=='octavo'or$string=='noveno')
                        {
                            $detalleAsignacion->ciclo='3';
                       
                    
                } 
                
              
               

                $detalleAsignacion->mdui=$maestroR;
                $detalleAsignacion->save();

                //se asignan materias automaticamente si es un profesor de primer, segundo ciclo o tercer ciclo
                switch ($detalleAsignacion->ciclo) {
                    case '1':

                    foreach ($materias as $materia) {
                        $asignacion = new Asignacion;
                        $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
                        $asignacion->mdui=$maestroR;
                        $asignacion->anioasignacion=$request->get('idanio');
                        $asignacion->id_materia=$materia->id_materia;
                        $asignacion->save();
                       
                        
                    }

                    break;

                    case '2':
                
                        $asignacion = new Asignacion;
                        $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
                        $asignacion->mdui=$maestroR;
                        $asignacion->anioasignacion=$request->get('idanio');
                       // $asignacion->id_materia=$materia->id_materia;
                        $asignacion->save();
                       
                        


                    break;    

                    case '3':
                    //si es un profesor de tercer ciclo se crea sin una materia asignada
                        $asignacion = new Asignacion;
                        $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
                        $asignacion->mdui=$maestroR;
                        $asignacion->anioasignacion=$request->get('idanio');
                       // $asignacion->id_materia=$materia->id_materia;
                        $asignacion->save();
                       
                    break; 
                    
                    default:
                        # code...
                        break;                        
                }//fin switch
                $ban="si";
        
            } else {
                //se comprueba si el maestro es de tercer ciclo 
                if(!is_null($asignacion))
                {
                    $resultado=DetalleAsignacion::where('mdui',$maestroR)->where('iddetallegrado',$iddg)->first();

                    if(is_null($resultado))
                    {
                        $detalleAsignacion = new DetalleAsignacion;
                        $detalleAsignacion->iddetallegrado=$iddg;
                        $detalleAsignacion->aniodetalleasignacion=$request->get('idanio');
                        $detalleAsignacion->coordinador='1';
                        $detalleAsignacion->mdui=$maestroR;
                        $detalleAsignacion->ciclo='3';
                        $detalleAsignacion->save();


                        $asignacion = new Asignacion;
                        $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
                        $asignacion->mdui=$maestroR;
                        $asignacion->anioasignacion=$request->get('idanio');
                       // $asignacion->id_materia=$materia->id_materia;
                        $asignacion->save();
                        $ban="si";
                    }else
                    {
                        $ban="no";
                    }

                    return Redirect::to('asignacion/'.$ban);
                }
                else{
                   
                    $ban="no";
                }
                return Redirect::to('asignacion/'.$ban);
            }

            return Redirect::to('asignacion/'.$ban);

        
       
    }





    public function update(AsignacionFormRequest $request, $id)
    {
        $usuarioactual=\Auth::user();
      
       //parametros de busqueda para el detalle_asignacion
        $turnoR=$request->get('idturno');
        $seccionR=$request->get('idseccion');
        $gradoR=$request->get('idgrado');
        $maestroR=$request->get('idmaestro');

  //verifica si la combinacion de grado, turno y seccion existen
  $consulta2=DetalleGrado::where('idgrado', $gradoR)->where('idseccion', $seccionR)->where('idturno', $turnoR)->first();
  if ($consulta2==null) {
      $ban="err2";
      return Redirect::to('asignacion/'.$ban);
  }

        $iddg=$consulta2->iddetallegrado;
     //se verifica el tipo de maestro
     $tm=Maestro::where('mdui',$maestroR)->first();
     $detalleAsignacion = DetalleAsignacion::where('aniodetalleasignacion',$request->get('idanio'))->where('iddetallegrado',$iddg)->where('coordinador',$tm->tipom)->first();
     
     if ($tm->tipoMaestro=1) {
        //se verifica si existe un registro en detalleasignacion
       
        if(is_null($detalleAsignacion))
        {   //no existe el valor en detalle asignacion

            //se guarda una tupla en detalle asignacion
            $detalleA= new DetalleAsignacion;
            $detalleA->iddetallegrado=$iddg;
            $detalleA->aniodetalleasignacion=$request->get('idanio');
            $detalleA->coordinador='1';
            $detalleA->save();

            //se guarda una tupla en asignacion
            
            $detalleAs= DetalleAsignacion::where('aniodetalleasignacion',$request->get('idanio'))->where('iddetallegrado',$iddg)->first();
            $asignacion=Asignacion::where('id_asignacion',$id)->first();
            $asignacion->id_detalleasignacion=$detalleAs->id_detalleasignacion;
            $asignacion->mdui=$maestroR;
            $asignacion->anioasignacion=$request->get('idanio');
            $asignacion->update();
            $ban="si";
            
    
        } else {
            //si se quiere actualizar pero ya existe un un cupo asignado 
            $ban="no";           
        }

        return Redirect::to('asignacion/'.$ban);

    } else {
        //si el maestro es de tercer ciclo

        //se verifica si existe un registro en detalle asignacion
             if (is_null($detalleAsignacion)) {
            //si no existe en la tabla detalle asignacion

            //se guarda una tupla en detalle asignacion
            $detalleAsignacion = new DetalleAsignacion;
            $detalleAsignacion->iddetallegrado=$iddg;
            $detalleAsignacion->aniodetalleasignacion=$request->get('idanio');
            $detalleAsignacion->coordinador='2';
            $detalleAsignacion->update();

            //se guarda una tupla en asignacion
            
            
            $asignacion=Asignacion::where('id_asignacion',$id)->first();
            $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
            $asignacion->mdui=$maestroR;
            $asignacion->anioasignacion=$request->get('idanio');
            $asignacion->update();
            $ban="si";

        } else {

            $detalleAsignacion->iddetallegrado=$iddg;
            $detalleAsignacion->aniodetalleasignacion=$request->get('idanio');
            $detalleAsignacion->coordinador='2';
            $detalleAsignacion->update();

            $asignacion=Asignacion::where('id_asignacion',$id)->first();
            $asignacion->id_detalleasignacion=$detalleAsignacion->id_detalleasignacion;
            $asignacion->mdui=$maestroR;
            $asignacion->anioasignacion=$request->get('idanio');
            $asignacion->update();
            $ban="si";
        } 
    }
        return Redirect::to('asignacion/'.$ban);
    }





    public function edit($id)
    {
        
        $usuarioactual=\Auth::user();
        //datos para el modal
        //informacion de maestros
        
        //catalogos de grados,secciones y turnos
        $grados = DB::table('grado')
        ->orderBy('idgrado', 'asc')
        ->get();
        $secciones = DB::table('seccion')
        ->orderBy('idseccion', 'asc')
        ->get();
        $turnos = DB::table('turno')
        ->orderBy('idturno', 'asc')
        ->get();
        //catalogo de años
        $anioDefecto=DB::table('anios')
        ->orderBy('valor', 'desc')
        ->get();

       


        $asignacion = Asignacion::findOrFail($id);
        if ($asignacion==null) {
            $ban="err";
            return Redirect::to('asignacion/'.$ban);
        }

        $dasg=DetalleAsignacion::findOrFail($asignacion->id_detalleasignacion);

        $ddtgr=DetalleGrado::findOrFail($dasg->iddetallegrado);
        

        $m=$asignacion->mdui;
       
        $maestro=Maestro::where('mdui', $m)->first();
        if ($maestro==null) {
            $ban="no";
            return Redirect::to('asignacion/'.$ban);
        }
        return view ("asignacion.edit", ["asignacion"=>$asignacion,"grados"=>$grados,
        "secciones"=>$secciones,"turnos"=>$turnos,"maestro"=>$maestro,"anios"=>$anioDefecto,
        'usuarioactual'=>$usuarioactual,'ddtgr'=>$ddtgr]);
    }
}
