@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Grados <a href="grado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('detalle.grado.search')
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
               @foreach ($grados as $gr)
				<tr>
					<td>{{ $gr->idgrado}}</td>
					<td>{{ $gr->nombre}}</td>
					<td>
						<a href="{{URL::action('GradoController@edit',$gr->idgrado)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$gr->idgrado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('detalle.grado.modal')
				@endforeach
			</table>
		</div>
		{{$grados->render()}}
	</div>
</div>

@endsection