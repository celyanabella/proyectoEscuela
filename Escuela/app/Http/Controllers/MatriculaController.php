<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Matricula;
use Escuela\TipoResponsable;
use Escuela\Responsable;
use Escuela\Turno;
use Escuela\Seccion;
use Escuela\Grado;
use Escuela\Estudiante;
use Escuela\PartidaNacimiento;
use Escuela\DetalleGrado;
use Escuela\DetallePariente;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


use Escuela\Http\Requests\MatriculaFormRequest;
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

class MatriculaController extends Controller
{
    public function __construct()	//para validar
    {
        #$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$matriculas = DB::table('matricula as ma')
    		#->join('detalle_grado as dg','ma.iddetallegrado','=','dg.iddetallegrado')
    		->join('estudiante as al','ma.nie','=','al.nie')
            #->join('detalle_pariente as pa','ma.id_matricula','=','pa.id_matricula')
    		->select('ma.id_matricula','ma.fechamatricula','al.nombre','al.apellido','ma.fotografia','ma.estado', 'al.nie')
            ->groupBy('ma.id_matricula','al.nombre','al.apellido','ma.fotografia', 'al.nie')
    		#->where('al.nie','LIKE','%'.$query.'%')
            ->where('al.apellido','LIKE','%'.$query.'%')
            ->where('ma.estado','=','Activo')
    		->orderBy('ma.id_matricula','desc')
    		->paginate(7);
            #->get();
    		return view('expediente.matricula.index',["matriculas"=>$matriculas,"searchText"=>$query]);
    	}

    }


    public function create()
    {
    	$tipos = DB::table('tipo_responsable')->get();

    	#$grados = DB::table('grado')->get();
        $grados = Grado::all();   

    	#$secciones = DB::table('seccion')->get();
        $secciones = Seccion::all();

    	#$turnos = DB::table('turno')->get();
        $turnos = Turno::all();

        $estudiantes = DB::table('estudiante')->get();
        $matriculas = DB::table('matricula')->get();

    	return view("expediente.matricula.create",["tipos"=>$tipos, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos, "estudiantes"=>$estudiantes, "matriculas"=>$matriculas]);
    }



    public function store (MatriculaFormRequest $request)
    {
        try{
                DB::beginTransaction();

        		$matricula = new Matricula;
        		$matricula->fechamatricula=$request->get('fechamatricula');

                //Presenta partida
                if (Input::get('presentapartida')) {
                    $matricula->presentapartida='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->presentapartida='NO';       // El usuario NO marcó el chechbox
                }

                //Certificado de promocion
                if (Input::get('certificadoprom')) {
                    $matricula->certificadoprom='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->certificadoprom='NO';       // El usuario NO marcó el chechbox
                }

                //Presenta Fotografias
                if (Input::get('presentafotos')) {
                    $matricula->presentafotos='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->presentafotos='NO';       // El usuario NO marcó el chechbox
                }    

                //Constancia de buena conducta
                if (Input::get('constanciaconducta')) {
                    $matricula->constanciaconducta='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->constanciaconducta='NO';       // El usuario NO marcó el chechbox
                }

                //EDUCACION INICIAL
                if (Input::get('educacioninicial')) {
                    $matricula->educacioninicial='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->educacioninicial='NO';       // El usuario NO marcó el chechbox
                }

                //REPITE GRADO
                if (Input::get('repitegrado')) {
                    $matricula->repitegrado='SI';       // El usuario marcó el checkbox 
                } else {
                    $matricula->repitegrado='NO';       // El usuario NO marcó el chechbox
                }

        		$matricula->estado='Activo';
        		$matricula->cePrevio=$request->get('cePrevio');

        		if(Input::hasFile('fotografia')){
        		$file = Input::file('fotografia');
        		$file -> move(public_path().'/imagenes/alumnos/', $file->getClientOriginalName());
        		$matricula->fotografia = $file->getClientOriginalName();
        	    }

        		//Ahora se procede al tratamiento de DetalleGrado

        		$detalleGrado = new DetalleGrado();
        		$detalleGrado->idgrado = $request->get('idgrado');
    	    	$detalleGrado->idseccion = $request->get('idseccion');
    	    	$detalleGrado->idturno = $request->get('idturno');
    	    	$detalleGrado->save();
        	
        		//Se hace la fk a la tabla matricula.

        		$matricula->iddetallegrado = $detalleGrado->iddetallegrado;

        		//Ahora de procede al tratamiento de Estudiante.

        		$partida = new PartidaNacimiento;
        		#$partida -> nie = 
        		$partida->folio = $request -> get('folio');
        		$partida->libro = $request -> get('libro');
        		$partida -> save();

        		//Se hace la fk a la tabla estudiante, una vez creada la partida.

        		$estudiante = new Estudiante;
        		$estudiante->nie = $request -> get('nie');
        		$estudiante->id_partida = $partida->id_partida;
        		$estudiante->nombre = $request -> get('nombre');
        		$estudiante->apellido = $request -> get('apellido');
        		$estudiante->fechadenacimiento = $request -> get('fechadenacimiento');

                //Sexo del estudiante
                $vt1 = $request->get('sexo');
                if ($vt1==0) {
                    $estudiante->sexo = 'F';
                }
                else{
                    $estudiante->sexo = 'M';
                }
        		
                //discapacidad  del estudiante
                $vt2 = $request->get('discapacidad');
                if ($vt2==0) {
                    $estudiante->discapacidad = 'N0';
                }
                else{
                    $estudiante->discapacidad = 'SI';
                }
        		$estudiante ->domicilio = $request -> get('domicilio');
        		$estudiante ->enfermedad = $request -> get('enfermedad');

                //Area geografica de residencia
                $vt3 = $request->get('zonahabitacion');
                if ($vt3==0) {
                    $estudiante->zonahabitacion = 'Urbano';
                }
                else{
                    $estudiante->zonahabitacion = 'Rural';
                }
                //Autorizacion de vacuna
                $vt4 = $request->get('autorizavacuna');
                if ($vt4==0) {
                    $estudiante->autorizavacuna = 'NO';
                }
                else{
                    $estudiante->autorizavacuna = 'SI';
                }
        		$estudiante ->estado = 'Activo';
        		$estudiante -> save();

        		//Se procede a guardar el nie
        		$partida->nie = $estudiante->nie;
        		$partida->save();

        		//Se procede a guardar datos de la Madre

        		$madre = new Responsable;
        		$madre->idresponsable=1;
        		$madre->nie=$estudiante->nie;
        		$madre->nombre =$request->get('nombre2');
        		$madre->apellido =$request->get('apellido2');
        		$madre->ocupacion =$request->get('ocupacion');
        		$madre->lugardetrabajo =$request->get('lugardetrabajo');
        		$madre->telefono =$request->get('telefono');
        		$madre->dui =$request->get('dui');
        		$madre->save();

                
                //Se procede a guardar datos de la Padre
                $padre = new Responsable;
                $padre->idresponsable=2;
                $padre->nie=$estudiante->nie;
                $padre->nombre =$request->get('nombre3');
                $padre->apellido =$request->get('apellido3');
                $padre->ocupacion =$request->get('ocupacion3');
                $padre->lugardetrabajo =$request->get('lugardetrabajo3');
                $padre->telefono =$request->get('telefono3');
                $padre->dui =$request->get('dui3');
                $padre->save();


                //Se procede a guardar datos del Contacto de Emergencia
                $contacto = new Responsable;
                $contacto->idresponsable=3;
                $contacto->nie=$estudiante->nie;
                $contacto->nombre =$request->get('nombre4');
                $contacto->apellido =$request->get('apellido4');
                $contacto->telefono =$request->get('telefono4');
                $contacto->save();
            
            
        		//Se procede a guardar la matricula
        		$matricula->nie = $estudiante->nie;
        		#$matricula -> save();


                $id_matricula = $request->get('id_matricula');
                $nie = $estudiante->nie;
                $parentesco = $request->get('parentesco');


                $cont = 0;

                while ( $cont < count($id_matricula)) {
                    $detalle = new DetallePariente();
                    $detalle->nie = $estudiante->nie;
                    $detalle->id_matricula = $id_matricula[$cont];
                    $detalle->parentesco = $parentesco[$cont];
                    $detalle->save();  
                    $cont =$cont+1;
                }

                $matricula -> save();

            DB::commit();

        } catch(\Exception $e)
        {
            DB::rollback();
        }    		

    	return Redirect::to('expediente/matricula');
    }

    public function show($id)		//Para mostrar
    {
        $matricula = Matricula::findOrFail($id);

        //Encontramos el  detalle de la matricula
        $dg = $matricula->iddetallegrado;
        $detalleg = DetalleGrado::findOrFail($dg);

        $idgrado= $detalleg->idgrado;
        $idseccion=$detalleg->idseccion;
        $idturno=$detalleg->idturno;

        $grado = Grado::findOrFail($idgrado);
        $seccion = Seccion::findOrFail($idseccion);
        $turno = Turno::findOrFail($idturno);


        $nie = $matricula->nie;

        $estudiante = Estudiante::where('nie',$nie)->first();
        $detallepartida = PartidaNacimiento::where('nie',$nie)->first();

        //Se obtienen los datos de la madre, padre, contacto
        $detalleM = Responsable::where('nie',$nie)->where('idresponsable',1)->first();
        $detalleP = Responsable::where('nie',$nie)->where('idresponsable',2)->first();
        $detalleC = Responsable::where('nie',$nie)->where('idresponsable',3)->first();

        $parientes = DB::table('detalle_pariente as dp')
            ->where('dp.nie',$nie)
            ->orderBy('dp.id_detalle','desc')
            ->get();

        $count = DetallePariente::where('nie', $nie)->count();

        /*for ($i=0; $i <$count ; $i++) { 
            $ids[$i] = $parientes[$i]->id_matricula;
        }

        for ($i=0; $i <$count ; $i++) { 
            $matriculas = DB::table('matricula as ma')
            ->where('ma.id_matricula',$ids[$i])
            ->get();
        }*/

        $parientess = DB::table('matricula as ma')
            #->join('detalle_grado as dg','ma.iddetallegrado','=','dg.iddetallegrado')
            ->join('detalle_pariente as dp','ma.id_matricula','=','dp.id_matricula')
            #->join('estudiante as al','ma.nie','=','al.nie')
            ->select('ma.id_matricula','ma.fotografia','dp.parentesco')
            ->groupBy('ma.id_matricula','ma.fotografia','dp.parentesco')
            #->where('al.nombre','LIKE','%'.$query.'%')
            ->where('dp.nie',$nie)
            #->where('ma.estado','=','Activo')
            #->orderBy('ma.id_matricula','desc')
            ->get();






    	return view("expediente.matricula.show",["matricula"=>$matricula,"grado"=>$grado, "seccion"=>$seccion, "turno"=>$turno, "estudiante"=>$estudiante, "detallepartida"=>$detallepartida, "detalleM"=>$detalleM, "detalleP"=>$detalleP, "detalleC"=>$detalleC, "parientess"=>$parientess ]);
    }

    public function edit($id)
    {
    	$matricula = Matricula::findOrFail($id);

    	#$tipos = DB::table('tipo_responsable')->get();
        $tipos = TipoResponsable::all();

        $grados = Grado::all();
    	#$grados = DB::table('grado')->get();

        $secciones = Seccion::all();
    	#$secciones = DB::table('seccion')->get();

        $turnos = Turno::all();
    	#$turnos = DB::table('turno')->get();

        $dg = $matricula->iddetallegrado;
        $detalleg = DetalleGrado::findOrFail($dg);

        $nie = $matricula->nie;

        $estudiante = Estudiante::where('nie',$nie)->first();
        #$estudiante = DB::table('estudiante')->where('nie','=',$nie);
        $detallepartida = PartidaNacimiento::where('nie',$nie)->first();
        #$detallepartida = Partida::findOrFail($nie);

        //Se obtienen los datos de la madre, padre, contacto
        $detalleM = Responsable::where('nie',$nie)->where('idresponsable',1)->first();
        $detalleP = Responsable::where('nie',$nie)->where('idresponsable',2)->first();
        $detalleC = Responsable::where('nie',$nie)->where('idresponsable',3)->first();
        #$detalleM = Responsable::where('idresponsable',1)->first();

        $matriculas = DB::table('matricula')->get();
        #$partida 

    	return view("expediente.matricula.edit",["matricula"=>$matricula, "detalleg"=>$detalleg, "grados"=>$grados, "secciones"=>$secciones, "turnos"=>$turnos, "matriculas"=>$matriculas, "estudiante"=>$estudiante, "detallepartida"=>$detallepartida, "detalleM"=>$detalleM, "detalleP"=>$detalleP, "detalleC"=>$detalleC]);
    }


    public function update(Matricula2FormRequest $request, $id)
    {	
        try{
            DB::beginTransaction();

    	    $matricula = Matricula::findOrFail($id);

    	   //TODO LO DEL METODO STORE
            $matricula->fechamatricula=$request->get('fechamatricula');

            //Presenta partida
            if (Input::get('presentapartida')) {
                $matricula->presentapartida='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->presentapartida='NO';       // El usuario NO marcó el chechbox
            }

            //Certificado de promocion
            if (Input::get('certificadoprom')) {
                $matricula->certificadoprom='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->certificadoprom='NO';       // El usuario NO marcó el chechbox
            }

            //Presenta Fotografias
            if (Input::get('presentafotos')) {
                $matricula->presentafotos='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->presentafotos='NO';       // El usuario NO marcó el chechbox
            }    

            //Constancia de buena conducta
            if (Input::get('constanciaconducta')) {
                $matricula->constanciaconducta='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->constanciaconducta='NO';       // El usuario NO marcó el chechbox
            }

            //EDUCACION INICIAL
            if (Input::get('educacioninicial')) {
                $matricula->educacioninicial='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->educacioninicial='NO';       // El usuario NO marcó el chechbox
            }

            //REPITE GRADO
            if (Input::get('repitegrado')) {
                $matricula->repitegrado='SI';       // El usuario marcó el checkbox 
            } else {
                $matricula->repitegrado='NO';       // El usuario NO marcó el chechbox
            }

            $matricula->estado='Activo';
            $matricula->cePrevio=$request->get('cePrevio');

            if(Input::hasFile('fotografia')){
            $file = Input::file('fotografia');
            $file -> move(public_path().'/imagenes/alumnos/', $file->getClientOriginalName());
            $matricula->fotografia = $file->getClientOriginalName();
            }

            //Ahora se procede al tratamiento de DetalleGrado

            $iddg = $matricula->iddetallegrado;                   //Obtengo el id
            $detalleGrado = DetalleGrado::findOrFail($iddg);      //Se busca en la BD
            $detalleGrado->idgrado = $request->get('idgrado');
            $detalleGrado->idseccion = $request->get('idseccion');
            $detalleGrado->idturno = $request->get('idturno');
            $detalleGrado -> update();
        
            //Se hace la fk a la tabla matricula.

            ################$matricula->iddetallegrado = $detalleGrado->iddetallegrado;

            //Ahora de procede al tratamiento de Estudiante.
            $nie = $matricula->nie;
            $partida = PartidaNacimiento::where('nie',$nie)->first();
            $partida->folio = $request -> get('folio');
            $partida->libro = $request -> get('libro');
            $partida -> update();

            //Se hace la fk a la tabla estudiante, una vez creada la partida.

            $estudiante = Estudiante::where('nie',$nie)->first();        //Obtengo el estudiante
            #$estudiante->nie = $request -> get('nie');
            $estudiante->id_partida = $partida->id_partida;
            $estudiante->nombre = $request -> get('nombre');
            $estudiante->apellido = $request -> get('apellido');
            $estudiante->fechadenacimiento = $request -> get('fechadenacimiento');

            //Sexo del estudiante
            $vt1 = $request->get('sexo');
            if ($vt1==0) {
                $estudiante->sexo = 'F';
            }
            else{
                $estudiante->sexo = 'M';
            }
            
            //discapacidad  del estudiante
            $vt2 = $request->get('discapacidad');
            if ($vt2==0) {
                $estudiante->discapacidad = 'N0';
            }
            else{
                $estudiante->discapacidad = 'SI';
            }
            $estudiante ->domicilio = $request -> get('domicilio');
            $estudiante ->enfermedad = $request -> get('enfermedad');

            //Area geografica de residencia
            $vt3 = $request->get('zonahabitacion');
            if ($vt3==0) {
                $estudiante->zonahabitacion = 'Urbano';
            }
            else{
                $estudiante->zonahabitacion = 'Rural';
            }
            //Autorizacion de vacuna
            $vt4 = $request->get('autorizavacuna');
            if ($vt4==0) {
                $estudiante->autorizavacuna = 'NO';
            }
            else{
                $estudiante->autorizavacuna = 'SI';
            }
            ######$estudiante ->estado = 'Activo';
            $estudiante -> update();

            //Se procede a guardar el nie
            $partida->nie = $estudiante->nie;
            $partida->update();

            //Se procede a guardar datos de la Madre

            $madre = Responsable::where('nie',$nie)->where('idresponsable',1)->first();
            ######$madre->idresponsable=1;
            $madre->nie=$estudiante->nie;
            $madre->nombre =$request->get('nombre2');
            $madre->apellido =$request->get('apellido2');
            $madre->ocupacion =$request->get('ocupacion');
            $madre->lugardetrabajo =$request->get('lugardetrabajo');
            $madre->telefono =$request->get('telefono');
            $madre->dui =$request->get('dui');
            $madre->update();

            
            //Se procede a guardar datos de la Padre
            $padre = Responsable::where('nie',$nie)->where('idresponsable',2)->first();
            ####$padre->idresponsable=2;
            $padre->nie=$estudiante->nie;
            $padre->nombre =$request->get('nombre3');
            $padre->apellido =$request->get('apellido3');
            $padre->ocupacion =$request->get('ocupacion3');
            $padre->lugardetrabajo =$request->get('lugardetrabajo3');
            $padre->telefono =$request->get('telefono3');
            $padre->dui =$request->get('dui3');
            $padre->update();


            //Se procede a guardar datos del Contacto de Emergencia
            $contacto = Responsable::where('nie',$nie)->where('idresponsable',3)->first();
            ###$contacto->idresponsable=3;
            $contacto->nie=$estudiante->nie;
            $contacto->nombre =$request->get('nombre4');
            $contacto->apellido =$request->get('apellido4');
            $contacto->telefono =$request->get('telefono4');
            $contacto->update();
        
        
            //Se procede a guardar la matricula
            $matricula->nie = $estudiante->nie;
            #$matricula -> save();


            $id_matricula = $request->get('id_matricula');
            $nie = $estudiante->nie;
            $parentesco = $request->get('parentesco');

            #$sum = count(DetallePariente::findOrFail($id));


            $cont = 0;

            while ( $cont < count($id_matricula)) {
                $detalle = new DetallePariente();
                $detalle->nie = $estudiante->nie;
                $detalle->id_matricula = $id_matricula[$cont];
                $detalle->parentesco = $parentesco[$cont];
                $detalle->save();  
                $cont =$cont+1;
            }  


    	   $matricula->update();
        
            DB::commit();

        }catch(\Exception $e)
        {
            DB::rollback();
        }

    	return Redirect::to('expediente/matricula');
    }


    public function destroy($id)
    {
    	$matricula=Matricula::findOrFail($id);
    	$matricula->estado = 'Inactivo';
    	$matricula->update();
    	return Redirect::to('expediente/matricula');
    }

}
