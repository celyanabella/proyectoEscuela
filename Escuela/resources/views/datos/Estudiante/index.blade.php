@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listados de Estudiantes</h3>
		
		
		@include('datos.Estudiante.search')
		
		{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
	<input type="text" name="grado" value={{$grado}} placeholder="grado" hidden>
	<input type="text" name="seccion" value={{$seccion}} placeholder="seccion" hidden>
	<input type="text" name="turno" value={{$turno}} placeholder="turno" hidden>
    <input type="text" name="anio" value={{$searchYear}} placeholder="turno" hidden>
	<button type="submit" class="btn btn-primary">Generar PDF</button>
	{!!Form::close()!!}
	</div>
</div>

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

@endsection