@extends ('layouts.admin')
@section('contenido')

<div class="row" >
	<blockquote><h1>Gestion de Asignacion        <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Asigne maestros a un grado especifico"></i></h1></blockquote>	
		
</div>

<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<label>Año de Inscripcion </label>
		</div>
	</div>
</div>
<div class="container" >
	<div class="row" >
		<div class="col-md-3">
			@if (Session::has('message'))
			<p class="alert alert-danger">{{ Session::get('message')}}</p>
			@endif

			@if (Session::has('si'))
			<p class="alert alert-success">{{ Session::get('si')}}</p>
			@endif

			@if (Session::has('no'))
			<p class="alert alert-danger">{{ Session::get('no')}}</p>
			@endif

			@if (Session::has('error1'))
			<p class="alert alert-warning">{{ Session::get('error1')}}</p>
			@endif
		</div>
	</div>
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
			
			<a class="btn btn-success form-control" href="" data-target="#modal-create" data-toggle="modal" ><i class="fa fa-fw -square -circle fa-plus-square" href=# data-toggle="tooltip" title="Asigne un docente a un grado en especifico" ></i> Asignar</a>
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

@if($asgs==null)
@if(Session::has('M1'))
<div class="alert alert-warning alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
  {{Session::get('M1')}}
</div>

@endif
	<h1><i class="fa fa-exclamation-circle"></i> No hay resultados </h1>
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
					<!-- consultar el index de asignacion   -->
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