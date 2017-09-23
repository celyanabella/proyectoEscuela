@extends ('layouts.admin')
@section('contenido')

<div class="row" >
	<blockquote><h1>Gestion de Asignacion</h1></blockquote>		
</div>


<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<label>Año de Inscripcion </label>
		</div>
	</div>
</div>

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

		@if($exito=='err2')
		<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> x</a>
		<strong>Error en la actualizacion</strong>
		</div>
			
		@endif

		@if($exito=='err3')
		<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> x</a>
		<strong>El profesor ya esta asignado o no le corresponde el grado al que quiere inscribirlo</strong>
		</div>
			
		@endif
</div>
	




<div class="row">
	<div class="col-md-12">

		<div class="col-md-3">
			<div class="form-group">
			@include('asignacion.search')
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			<a class="btn btn-success form-control" href="" data-target="#modal-create" data-toggle="modal"><i class="fa fa-fw -square -circle fa-plus-square"></i> Asignar</a>
				@include('asignacion.modal')
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
			<button type="submit" class="btn form-control btn-danger"><i class="fa fa-file"></i> Generar PDF</button>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
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
                        @if($cnst->nombremateria==null)
							 <a href="{{URL::action('AsignacionMateriaController@edit',$cnst->id_asignacion)}}"><button class="btn btn-warning">Asignar/Editar Materia</button></a>
						@else
							
						@endif
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