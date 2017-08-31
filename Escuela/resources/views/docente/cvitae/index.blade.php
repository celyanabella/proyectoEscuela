@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Docentes <a href="cvitae/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message')}}</p>
        @endif

        @include('docente.cvitae.search')
    </div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fotografia</th>
					<th>Nombre</th>
					<th>Fecha Nac.</th>
					<th>dui</th>
					<th>Direccion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($hojas as $ho)
				<tr>
					<td>
						<img src="{{asset('imagenes/maestros/'.$ho->fotografia)}}" alt="{{ $ho->fotografia}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>{{ $ho->nombre }} {{$ho->apellido}} </td>
					<td>{{ $ho->fechanacimiento }}</td>
					<td>{{ $ho->mdui }}</td>
					<td>{{ $ho->direccion }}</td>
					<td>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$hojas->render()}}
	</div>
</div>


@endsection