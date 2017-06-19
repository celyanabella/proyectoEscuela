@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorías <a href="tipoResponsable/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('datos.tipoResponsable.search')
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
               @foreach ($tipos as $ti)
				<tr>
					<td>{{ $ti->idresponsable}}</td>
					<td>{{ $ti->nombretipo}}</td>
					<td>
						<a href="{{URL::action('TipoResponsableController@edit',$ti->idresponsable)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ti->idresponsable}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('datos.tipoResponsable.modal')
				@endforeach
			</table>
		</div>
		{{$tipos->render()}}
	</div>
</div>

@endsection