<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;
use Escuela\Http\Controllers\PDF;

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

    public function crearPDF($datos,$vistaurl)
    {

        $data=$datos;
        $view=\View::make($vistaurl, compact('data'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reportegrado');

    }

    public function store(Request $request)
    {

   
       $resultado =  DB::select("select turno.nombre as turno, grado.nombre as grado, seccion.nombre as seccion,estudiante.nombre as nombreEstudiante,estudiante.apellido as apellidoEstudiante
        from Grado
        inner join Detalle_Grado on Grado.idgrado = Detalle_Grado.idGrado
        inner join Seccion on Detalle_Grado.idSeccion = Seccion.idSeccion
        inner join Turno on Detalle_Grado.idTurno = Turno.idTurno
        inner join Matricula on Detalle_Grado.idDetalleGrado = Matricula.idDetalleGrado
        inner join Estudiante on Matricula.nie = Estudiante.nie
        where Grado.idGrado={$request->grado} and Seccion.idSeccion ={$request->seccion} and Turno.IdTurno = {$request->turno}");

        $vistaurl = "listado";

        return $this ->crearPDF($resultado,$vistaurl); 

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
