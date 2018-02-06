@extends ('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				<p>Correcciones:</p>
				<?php $cont = 1; ?>
				@foreach ($errors->all() as $error)
					<li>{{$cont}}. {{$error}}</li>
					<?php $cont=$cont+1; ?>
				@endforeach
				</ul>
			</div>
			@endif
	</div>
</div>



{!!Form::model($hoja,['method'=>'PATCH','route'=>['docente.capacitaciones.update',$hoja->id_hoja], 'files'=>'true'])!!}
{{Form::token()}}

<fieldset class="well the-fieldset">
	<div class="col-md-12">
		<legend class="the-legend"><h3>Capacitaciones</h3></legend>
	</div>

	<div class="col-md-12">	
		<div class="panel panel-primary">
			<div class="panel-body">
					<h3>Capacitaciones recibidas</h3><span><p>(durante los últimos 3 años)</p></span>
					<div class="row"> 
						<div class="form-group col-md-2">
							<label for="anios">Año</label>
							{!! Form::number('anio', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Año...', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-7">
							<label for="nombrecapacitacion">Nombre de la capacitación recibida</label>
							{!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca el nombre de la capacitacion recibida...', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-2">
							<label for="horas">Horas</label>
							{!! Form::number('horas', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Horas...', 'autofocus'=>'on']) !!}
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia1">Copia</label>
							{!! Form::file('copia', ['class' => 'form-control', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn">

								<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            					<a href="{{URL::action('HojaVidaController@index')}}" class="btn btn-danger">Cancelar</a>
								<button class="btn btn-primary" type="submit">Guardar</button>
								</span>
							</div>
						</div>
					</div>	
			</div>
		</div>
	</div>
</fieldset>

{!!Form::close()!!}


@endsection