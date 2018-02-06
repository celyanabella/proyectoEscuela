@extends ('layouts.admin')
@section('contenido')

<div class="row" >
	<blockquote><h1>Evaluaciones <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Asigne evaluaciones a una materia"></i></h1></blockquote>	
		
</div>

<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<label>Trimestre</label>
		</div>
	</div>
</div>

<div class="container" >
	<div class="row" >
		<div class="col-md-3">
				<label>Actividad</label>
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
			@include('evaluaciones.search')
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			
			<a class="btn btn-success form-control" href="" data-target="#modal-create" data-toggle="modal" ><i class="fa fa-fw -square -circle fa-plus-square" href=# data-toggle="tooltip" title="Crea una nueva evaluacion para la actual materia" ></i>Nueva Evaluacion</a>
				@include('evaluaciones.modal')
			</div>
		</div>

		
	</div>
</div>

@if(Session::has('M1'))
<div class="alert alert-warning alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
 opss! La combinacion <strong>{{Session::get('M1')}}</strong> no esta definida. Puede agregarla <a href="{{URL::action('CupoController@index')}}">aqui</a>
</div>
@if($asgs==null)


@endif
	<h1><i class="fa fa-exclamation-circle"></i> No hay resultados </h1>
@else
	<h4>Mostrando resultados del año:</h4>
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Actividad</th>
                    <th>Periodo</th>
                    <th>Porcentaje</th>
                    <th>Opciones</th>
				</thead>
              @foreach($evals as $eval)
				  <tr>
					<td>{{$eval->nombre}}</td>
					<td>{{$eval->nombreactividad}}</td>
					
					<td>
						<a href=""><button class="btn btn-info">Editar</button></a>
					</td>
                    <td>
						<a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
				</tr>
				
			  @endforeach
				
						
			</table>
		</div>

	</div>
</div>
@endif


@endsection