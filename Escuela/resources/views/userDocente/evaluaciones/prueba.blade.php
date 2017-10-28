@extends('layouts.maestro')
@section('contenido')

<div class="row" >
	<blockquote><h1>Evaluaciones de {{$nMateria}}     <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Asigne maestros a un grado especifico"></i></h1></blockquote>	
		
</div>

<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<h5>Grado: {{$nGrado}}   </h5>
                <h5>Seccion: "{{$nSeccion}}"</h5>
                <h5>Turno: {{$nTurno}}</h5>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="col-md-2">
			<div class="form-group">
			
			<a class="btn btn-success form-control" href="" data-target="#modal-create" data-toggle="modal" ><i class="fa fa-fw -square -circle fa-plus-square" href=# data-toggle="tooltip" title="Asigne un docente a un grado en especifico" ></i> Nueva Evaluacion</a>
				@include('userDocente.evaluaciones.modal1')
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
			<button type="submit" class="btn form-control btn-danger"><i class="fa fa-file"></i> Generar PDF</button>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>

@endsection