<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;
use Escuela\Http\Controllers\PDF;
use Illuminate\Support\Facades\Redirect;
use Escuela\Http\Requests;
use DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reporte');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function crearPDF($datos,$vistaurl,$y)
    {

        $data=$datos;
        $ys=$y;
        $view=\View::make($vistaurl, compact('data'),compact('ys'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reportegrado');

    }

    public function store(Request $request)
    {


   
    /*   $resultado =  DB::select("select turno.nombre as turno,matricula.fechadematricula as anio, grado.nombre as grado,
     seccion.nombre as seccion,estudiante.nombre as nombreEstudiante,estudiante.apellido as apellidoEstudiante
        from Grado
        inner join Detalle_Grado on Grado.idgrado = Detalle_Grado.idGrado
        inner join Seccion on Detalle_Grado.idSeccion = Seccion.idSeccion
        inner join Turno on Detalle_Grado.idTurno = Turno.idTurno
        inner join Matricula on Detalle_Grado.idDetalleGrado = Matricula.idDetalleGrado
        inner join Estudiante on Matricula.nie = Estudiante.nie
        where Grado.idGrado={$request->grado} and Seccion.idSeccion ={$request->seccion} and Turno.IdTurno = {$request->turno}");*/
            $years=$request->anio;
        $resultado = DB::table('estudiante')
            ->select('estudiante.nombre as nombreEstudiante','estudiante.apellido as apellidoEstudiante','estudiante.nie',
            'matricula.nie','grado.nombre as grado','seccion.nombre as seccion','turno.nombre as turno',
            'matricula.fechamatricula as anio')
            ->join('matricula as matricula','estudiante.nie','=','matricula.nie','full outer')
            ->join('detalle_grado as detalle_grado','matricula.iddetallegrado','=','detalle_grado.iddetallegrado','full outer')
            ->join('grado as grado','detalle_grado.idgrado','=','grado.idgrado','full outer')
            ->join('seccion as seccion','detalle_grado.idseccion','=','seccion.idseccion','full outer')
            ->join('turno as turno','detalle_grado.idturno','=','turno.idturno','full outer')
           
               ->Where('seccion.idseccion','=',$request->seccion)
               ->Where('grado.idgrado','=',$request->grado)
               ->Where('turno.idturno','=',$request->turno)
               ->whereYear('matricula.fechamatricula','=',$request->anio)
               ->orderby('estudiante.apellido','asc')
            ->get();

        $vistaurl = "listado";

        return $this ->crearPDF($resultado,$vistaurl,$years); 

        //$pdf = PDF::loadView('listado',['resultado'=>$resultado]);
        //return $pdf->download('archivo.pdf');

       //dd($resultado);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
