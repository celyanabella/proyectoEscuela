@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<blockquote><h1>Listados de Estudiantes <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Aqui podra generar listados de estudiantes"></i></h1></blockquote>
		@include('datos.Estudiante.search')
		
		{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
			<div class="form-group">
			<input type="text" name="grado" value={{$grado}} placeholder="grado" hidden>
			<input type="text" name="seccion" value={{$seccion}} placeholder="seccion" hidden>
			<input type="text" name="turno" value={{$turno}} placeholder="turno" hidden>
		    <input type="text" name="anio" value={{$searchYear}} placeholder="turno" hidden>
			<button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Genere un PDF listo para imprimir el cual contendra una lista de estudiantes">Generar PDF</button>
			</div>
	{!!Form::close()!!}
		
		
	</div>
</div>
@if($estudiantes==null)


@if(Session::has('error1'))
<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
<strong>Oh!</strong> Al parece no hay un resultado con {{Session::get('error1')}}
@endif

<h1><i class="fa fa-exclamation-circle"></i> No hay resultados </h1>

@else
<h4>Mostrando resultados del año: {{$searchYear}}</h4>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>NIE</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Grado</th>
					<th>Seccion</th>
					<th>Turno</th>
				</thead>
               @foreach ($estudiantes as $est)
				<tr>
					<td>{{ $est->nie}}</td>
					<td>{{ $est->apellido}}</td>
					<td>{{$est->nombre}}</td>
					<td>{{$est->nombreGrado}}</td>
					<td>{{$est->nombreSeccion}}</td>
					<td>{{$est->nombreTurno}}</td>
				</tr>
				@include('datos.Estudiante.modal')
				@endforeach
			</table>
		</div>
	
	</div>
</div>
@endif
@endsection