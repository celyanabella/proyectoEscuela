@extends ('layouts.maestro')
@section('contenido')

<div class="row" >
	<blockquote><h1>Evaluaciones <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Asigne evaluaciones a una materia"></i></h1></blockquote>	
		
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
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel with-nav-tabs panel-primary">
				<div class="panel-heading">
					<ul class="nav nav-tabs">
						<?php $a = 0; ?>
						@foreach($materias as $item)
						@if($item->estado=='Activo')
							@if($a == 0)
							<li class="active"><a href="#{{$item->nombre}}" data-toggle="tab">{{$item->nombre}}</a></li>
							@else
							<li><a href="#{{$item->nombre}}" data-toggle="tab">{{$item->nombre}}</a></li>
							@endif
							<?php $a=$a+1; ?>
						@else
							
						@endif
							
						@endforeach
					</ul>

					
				</div>
				<div class="panel-body">
					<div class="tab-content">
					<?php $b = 0; ?>
						@foreach($materias as $item)
						@if($item->estado=='Activo')
						@if($b == 0)
						<div class="tab-pane fade in active" id="{{$item->nombre}}">
						@else
						<div class="tab-pane fade" id="{{$item->nombre}}">
						@endif
						<?php $b=$b+1; ?>
							<div class="row">
								<div class="col-md-12">
									
										<h2>Porcentaje asignado a: {{$item->nombre}}</h2>
											<div class="progress">
												<div class="progress-bar progress-bar-success" role="progressbar" style="width:40%">
												Evaluacion 1
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">
												Evaluacion 2
												</div>
												<div class="progress-bar progress-bar-danger" role="progressbar" style="width:30%">
												Evaluacion 3
												</div>
											</div>
										
								</div>
							</div>
										

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
              
											<tr>
												<td>{{$item->nombre}}</td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<a href=""><button class="btn btn-info">Editar</button></a>
													<a href=""><button class="btn btn-danger">Eliminar</button></a>
												</td>
											</tr>
									</table>
								</div>
								
							</div>
						</div>

						</div>	
						@else
							
						@endif
							
						@endforeach
						
						

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	
@endif


@endsection