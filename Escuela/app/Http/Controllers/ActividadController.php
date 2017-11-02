<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Actividad;
use Escuela\Trimestre;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


use Escuela\Http\Requests\ActividadFormRequest;

use DB;

class ActividadController extends Controller
{
     public function __construct()	//para validar
    {
        #$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuarioactual=\Auth::user();

    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$actividad = DB::table('actividad')
            ->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('id_trimestre','asc')
    		->paginate(12);
    		return view('detalle.actividad.index',["actividad"=>$actividad,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}

    }

    public function create()
    {
        $usuarioactual=\Auth::user();

        $trimestres = Trimestre::orderBy('trimestre.id_trimestre','asc');

    	return view("detalle.actividad.create",["trimestres"=>$trimestres,"usuarioactual"=>$usuarioactual]);
    }

    public function store( ActividadFormRequest $request)		//Para almacenar
    {
        $usuarioactual=\Auth::user();

        $actividades=Actividad::where('id_trimestre', $request->get('id_trimestre'))->get();

        $porc = $request -> get('porcentaje');
        $trim = $request -> get('id_trimestre');
        $nombre = $request -> get('nombre');
        $suma = 0;

        if(!is_null($actividades)){
                foreach ($actividades as $act) {
                    $suma = $suma + $act->porcentaje;  
                }

                $lim = $suma + $porc;       //Se valida que no supere el limite de ponderación

                if ($lim > 100) {
                     Session::flash('limite', ''.'No fué posible crear la actividad '.$nombre.' ('.$porc.'%) '.'. Ya fue asignado el '.$suma.'% '.' al TRIMESTRE '.$trim.'. Revisa las Ponderaciones');

                    return Redirect::to('detalle/actividad');
                }

        }

        $actividad= new Actividad;
        $actividad->id_trimestre= $trim;
        $actividad->nombre= $nombre;
        $actividad->porcentaje= $porc;
        $actividad -> save();

        Session::flash('create', ''.' Actividad '.$nombre.' guardada con éxito');
        return Redirect::to('detalle/actividad');
        
    }

    public function show($id)		//Para mostrar
    {
        $usuarioactual=\Auth::user();
    	return view("detalle.actividad.show",["actividad"=>Actividad::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }

    public function edit($id)
    {   
        $usuarioactual=\Auth::user();

        $trimestres = DB::table('trimestre')->get();
        $actividad = Actividad::findOrFail($id);

    	return view("detalle.actividad.edit",["actividad"=>$actividad,"trimestres"=>$trimestres, "usuarioactual"=>$usuarioactual]);
    }

    public function update(ActividadFormRequest $request, $id)
    {	
        
        $usuarioactual=\Auth::user();

        $actividad = Actividad::findOrFail($id);
        $ponderacion = $actividad->porcentaje;

        $porc = $request -> get('porcentaje');
        $trim = $request -> get('id_trimestre');
        $nombre = $request -> get('nombre');

        $actividades=Actividad::where('id_trimestre', $trim)->get();

        $suma = 0;

        if(!is_null($actividades)){
                foreach ($actividades as $act) {
                    $suma = $suma + $act->porcentaje;  
                }
            }

        $var = $suma - $ponderacion;

        $lim = $var + $porc;       

        //Para el escenario que quiera actualizar en el mismo trimestre
        if ($actividad->id_trimestre == $trim) {
            if ($lim <=100) {
                $actividad->id_trimestre= $trim;
                $actividad->nombre= $nombre;
                $actividad->porcentaje= $porc;
                $actividad -> update();

                Session::flash('update', ''.' Actividad '.$nombre.' ('.$porc.'%) '.' Actualizado con éxito');
                return Redirect::to('detalle/actividad');
            }
        }

        //Si esta en distinto trimestre 
        if ($actividad->id_trimestre != $trim) {
            //Está lleno
            if ($suma == 100) {
                Session::flash('limite', ''.'No fué posible actualizar la actividad '.$nombre.' ('.$porc.'%) '.'. Ya fue asignado el '.$suma.'% '.' al TRIMESTRE '.$trim.'. Revisa las Ponderaciones');

                return Redirect::to('detalle/actividad');
            }

            //No supera el límite
            if ($lim<=100) {
                $actividad->id_trimestre= $trim;
                $actividad->nombre= $nombre;
                $actividad->porcentaje= $porc;
                $actividad -> update();

                Session::flash('update', ''.' Actividad '.$nombre.' ('.$porc.'%) '.' Actualizado con éxito');
                return Redirect::to('detalle/actividad');
            }
        }

        // Supera el límite
        if ($lim > 100) {
            Session::flash('limite', ''.'No fué posible actualizar la actividad '.$nombre.' ('.$porc.'%) '.'. Ya fue asignado el '.$suma.'% '.' al TRIMESTRE '.$trim.'. Revisa las Ponderaciones');

             return Redirect::to('detalle/actividad');
        }

        //y por so todavia falla ...
        return Redirect::to('detalle/actividad');        
        
    }

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

    	$actividad=Actividad::findOrFail($id);
        actividad::destroy($id);
        $actividad->update();

        Session::flash('message', '"'.$actividad->periodo.'"'.' fue eliminado de nuestros registros');

    	return Redirect::to('detalle/actividad');
    }

     public function porcentaje($id)
    {
        $usuarioactual=\Auth::user();
        $actividad = $_GET['porcentaje'];
       $por = 100;

       $actual = $por-$actividad;

       echo"<br/> &nbsp; porcentaje". $actual. " ";
        return view("detalle.actividad.create",["actividad"=>Actividad::findOrFail($id), "usuarioactual"=>$usuarioactual]);
    }



}

