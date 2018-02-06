@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de materia <a href="materia/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@if (Session::has('message'))
			<p class="alert alert-danger">{{ Session::get('message')}}</p>
		@endif
		@include('detalle.materia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($materias as $gr)
				<tr>
					<td>{{ $gr->id_materia}}</td>
					<td>{{ $gr->codigo}}</td>
					<td>{{ $gr->nombre}}</td>
					<td>
						<a href="{{URL::action('MateriaController@edit',$gr->id_materia)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$gr->id_materia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('detalle.materia.modal')
				@endforeach
			</table>
		</div>
		{{$materias->render()}}
	</div>
</div>

@endsection