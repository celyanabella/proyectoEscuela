@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Secciones <a href="seccion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('detalle.seccion.search')
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
               @foreach ($secciones as $ss)
				<tr>
					<td>{{ $ss->idseccion}}</td>
					<td>{{ $ss->nombre}}</td>
					<td>
						<a href="{{URL::action('SeccionController@edit',$ss->idseccion)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ss->idseccion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('detalle.seccion.modal')
				@endforeach
			</table>
		</div>
		{{$secciones->render()}}
	</div>
</div>

@endsection