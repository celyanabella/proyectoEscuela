@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Busqueda de Estudiante</h3>
		
		@include('datos.Estudiante.search')
		
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
				</thead>
               @foreach ($estudiantes as $est)
				<tr>
					<td>{{ $est->nie}}</td>
					<td>{{ $est->apellido}}</td>
					<td>{{$est->nombre}}</td>
					<td>{{$est->nombreGrado}}</td>
					<td>{{$est->nombreSeccion}}</td>
					<td></td>

					
					<td>
						<a href="{{URL::action('EstudianteController@show',$est->nie)}}"><button class="btn btn-info">VER</button></a>
					</td>
				</tr>
				@include('datos.Estudiante.modal')
				@endforeach
			</table>
		</div>
	
	</div>
</div>

@endsection