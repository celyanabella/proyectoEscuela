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



{!!Form::model($hoja,['method'=>'PATCH','route'=>['docente.estudios.update',$hoja->id_hoja], 'files'=>'true'])!!}
{{Form::token()}}

<fieldset class="well the-fieldset">
	<div class="col-md-12">
		<legend class="the-legend"><h3>Estudios Realizados</h3></legend>
	</div>

	<div class="col-md-12">	
		<div class="panel panel-primary">
			<div class="panel-body">
					<h3>Estudios academicos</h3><span><p>(después del bachillerato)</p></span>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="institucion">Institución</label>
							{!! Form::text('institucion', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Institucion donde realizo sus estudios', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-2">
							<label for="tipo">Clase</label>
							{!! Form::text('tipo', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Tipo...', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-3">
							<label for="clase">Especialidad</label>
							{!! Form::text('especialidad', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca la especialidad', 'autofocus'=>'on']) !!}
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia0">Copia</label>
							{!! Form::file('copia', ['class' => 'form-control', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn">

									<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
	            					<a href="{{URL::action('HojaVidaController@index')}}" class="btn btn-danger">Cancelar</a>

									<button class="btn btn-primary " type="submit">Guardar</button>
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