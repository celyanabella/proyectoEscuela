@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<blockquote><h2>Nuevo Ingreso</h2><a href="matricula/create"><button class="btn btn-success">Nueva Matricula</button></a></blockquote> 
	
		@include('expediente.matricula.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha Matricula</th>
					<th>NIE</th>
					<th>Estudiante</th>
					<th>Foto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($matriculas as $ma)
				<tr>
					<td>{{ $ma->id_matricula}}</td>
					<td>{{ $ma->fechamatricula }}</td>
					<td>{{ $ma->nie }}</td>
					<td>{{ $ma->nombre }} {{$ma->apellido}} </td>
					<td>
						<img src="{{asset('imagenes/alumnos/'.$ma->fotografia)}}" alt="{{ $ma->fotografia}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>
						<a href="{{URL::action('MatriculaController@edit',$ma->id_matricula)}}"><button class="btn btn-info">Editar</button></a>
						<a href="{{URL::action('MatriculaController@show',$ma->id_matricula)}}"><button class="btn btn-warning">Ver</button></a>
                         <a href="" data-target="#modal-delete-{{$ma->id_matricula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('expediente.matricula.modal')
				@endforeach
			</table>
		</div>
		{{$matriculas->render()}}
	</div>
</div>

@endsection