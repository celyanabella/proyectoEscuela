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

@if(Session::has('M1'))
<div class="alert alert-warning alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
 opss! La combinacion <strong>{{Session::get('M1')}}</strong> no esta definida. Puede agregarla <a href="{{URL::action('CupoController@index')}}">aqui</a>
</div>
@endif
	
@if($asgs==null)

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
					<th>Es Coordinador</th>
					<th>Opciones</th>

				</thead>
              @foreach($asgs as $cnst)
				  <tr>
					<td>{{$cnst->nombre}}</td>
					<td>{{$cnst->apellido}}</td>
					<td>{{$cnst->nombreGrado}}</td>
					<td>{{$cnst->nombreSeccion}}</td>
					<td>{{$cnst->nombreTurno}}</td>
					<td>
					@if($cnst->coordinador==1)SI
					@endif
					@if($cnst->coordinador==2)NO
					@endif
					</td>
					<td>
					@if($cnst->coordinador==0)
						<a href="{{URL::action('AsignacionMateriaController@edit',$cnst->id_detalleasignacion)}}"><button class="btn btn-warning">Asignar Materia</button></a>
					@endif
				
						
					</td>
				</tr>
			  @endforeach
			</table>
		</div>

	</div>
</div>
@endif


@endsection