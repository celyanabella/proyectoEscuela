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



{!!Form::model($hoja,['method'=>'PATCH','route'=>['docente.trabajos.update',$hoja->id_hoja], 'files'=>'true'])!!}
{{Form::token()}}

<fieldset class="well the-fieldset">
	<div class="col-md-12">
		<legend class="the-legend"><h3>Recórd Laboral</h3></legend>
	</div>

	<div class="col-md-12">	
		<div class="panel panel-primary">
			<div class="panel-body">
					<h3>Instituciones donde trabajo anteriormente</h3>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="cargo">Cargo</label>
							{!! Form::text('cargo', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Cargo que ocupaba...', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-2">
							<label for="lugar">Lugar de trabajo</label>
							{!! Form::text('lugar', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Lugar de trabajo...', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-2">
							<label for="tiempo">Tiempo</label>
							{!! Form::text('tiempo', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Tiempo que trabajo...', 'autofocus'=>'on']) !!}
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia2">Copia</label>
							{!! Form::file('copia', ['class' => 'form-control', 'autofocus'=>'on']) !!}
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn">
								<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            					<a href="{{URL::action('HojaVidaController@index')}}" class="btn btn-danger ">Cancelar</a>
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