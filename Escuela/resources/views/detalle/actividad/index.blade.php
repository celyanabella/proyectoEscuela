@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Actividades</h3>

		<a href="actividad/create"><button class="btn btn-success"><i class="fa fa-fw -square -circle fa-plus-square"></i> Nueva Actividad</button></a> <br><br>
		
		@if (Session::has('limite'))
			<p class="alert alert-warning">{{ Session::get('limite')}}</p>
		@endif

		@if (Session::has('create'))
			<p class="alert alert-info">{{ Session::get('create')}}</p>
		@endif

		@if (Session::has('update'))
			<p class="alert alert-info">{{ Session::get('update')}}</p>
		@endif

		@include('detalle.actividad.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Trimestre</th>
					<th>Nombre</th>
					<th>Porcentaje</th>
					<th>Opciones</th>
				</thead>
               @foreach ($actividad as $gr)
				<tr>
					
					<td>{{ $gr->id_trimestre}}</td>
					<td>{{ $gr->nombre}}</td>
					<td>{{ $gr->porcentaje}}</td>
					<td>
						<a href="{{URL::action('ActividadController@edit',$gr->id_actividad)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$gr->id_actividad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('detalle.actividad.modal')
				@endforeach
			</table>
		</div>
		{{$actividad->render()}}
	</div>
</div>

@endsection