@extends ('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<blockquote><h1>Gestion de Asignacion</h1></blockquote>
		
		@include('asignacion.search')
		
	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Grado</th>
					<th>Seccion</th>
					<th>Turno</th>
                    <th>Grado</th>
                    <th>Materia</th>
                    <th>Opciones</th>
				</thead>
              @foreach($consulta as $cnst)
				  <tr>
					<td>{{$cnst->nombremaestro}}</td>
					<td>{{$cnst->apellidomaestro}}</td>
					<td>{{$cnst->nombremaestro}}</td>
					<td>{{$cnst->nombremaestro}}</td>
					<td></td>
					<td></td>
					<td></td>
					<td>
					<!-- consultar el index de tiporesponsable   -->
						<a href=""><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="" data-toggle="modal"><button class="btn btn-warning">Asignar/Editar Materia</button></a>
						<a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
				</tr>
			  @endforeach
				
						
			</table>
		</div>
	
	</div>
</div>
@endsection