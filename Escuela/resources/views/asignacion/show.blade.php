@extends ('layouts.admin')
@section('contenido')

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
@if($exito=='si')
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> x</a>
		<strong>Asignacion Guardada con exito</strong>
		</div>
@endif

@if($exito=='no')
	
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> x</a>
		<strong>Error: Ya existe una asignacion</strong>
		</div>

			
		@endif


		@if($exito=='err')
		<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> x</a>
		<strong>No existe la combinacion de turno,seccion,grado</strong>
		</div>
			
		@endif
</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<blockquote><h1>Gestion de Asignacion</h1></blockquote>
		
		@include('asignacion.search')

	{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
			<div class="form-group">
		    
			<button type="submit" class="btn btn-danger">Generar PDF</button>
			</div>
	{!!Form::close()!!}

	<a href="" data-target="#modal-create" data-toggle="modal"><button class="btn btn-danger">Nueva Asignacion</button></a>
		@include('asignacion.modal')
	</div>

</div>

@if($asgs==null)
	<h1>No hay resultados <i class="fa fa-exclamation-circle"></i></h1>
@else
	<h4>Mostrando resultados del año: {{$searchYear}}</h4>
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
                    <th>Materia</th>
                    <th>Opciones</th>
				</thead>
              @foreach($asgs as $cnst)
				  <tr>
					<td>{{$cnst->nombre}}</td>
					<td>{{$cnst->apellido}}</td>
					<td>{{$cnst->nombregrado}}</td>
					<td>{{$cnst->nombreseccion}}</td>
					<td>{{$cnst->nombreturno}}</td>
					<td>{{$cnst->nombremateria}}</td>
					
					<td>
					<!-- consultar el index de tiporesponsable   -->
						<a href="{{URL::action('AsignacionController@edit',$cnst->id_asignacion)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="{{URL::action('AsignacionMateriaController@edit',$cnst->id_asignacion)}}"><button class="btn btn-warning">Asignar/Editar Materia</button></a>
						<a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
				</tr>
				
			  @endforeach
				
						
			</table>
		</div>
	
	</div>
</div>
@endif


@endsection