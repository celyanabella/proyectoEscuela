@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Turnos <a href="turno/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('detalle.turno.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($turnos as $tu)
				<tr>
					<td>{{ $tu->idturno}}</td>
					<td>{{ $tu->nombre}}</td>
					<td>
						<a href="{{URL::action('TurnoController@edit',$tu->idturno)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$tu->idturno}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('detalle.turno.modal')
				@endforeach
			</table>
		</div>
		{{$turnos->render()}}
	</div>
</div>

@endsection