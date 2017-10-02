@extends ('layouts.admin')
@section('contenido')

<div class="row" >
	<blockquote><h1>Gestion de Asignacion</h1></blockquote>		
</div>


<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<label>Año de Inscripcion </label>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">

		<div class="col-md-3">
			<div class="form-group">
			@include('asignacion.search')
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			<a class="btn btn-success form-control" href="" data-target="#modal-create" data-toggle="modal"><i class="fa fa-fw -square -circle fa-plus-square"></i> Asignar</a>
				@include('asignacion.modal')
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

</div>

@if($asgs==null)
	<h1>No hay resultados <i class="fa fa-exclamation-circle"></i></h1>
@else
	
@endif


@endsection