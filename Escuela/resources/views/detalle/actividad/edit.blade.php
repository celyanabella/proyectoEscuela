@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Actividad: {{ $actividad->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($actividad,['method'=>'PATCH','route'=>['detalle.actividad.update',$actividad->id_actividad]])!!}
            {{Form::token()}}
            
            <div class="row">
            	<div class="col-md-3" >
					<div class="form-group">
						<label>Seleccione el trimestre</label>
						<select name="id_trimestre" class="form-control">
							@foreach ($trimestres as $trim)
								@if ($trim->id_trimestre == $actividad->id_trimestre)
								<option value="{{$trim->id_trimestre}}" selected>{{$trim->nombre}}</option>
								@else
								<option value="{{$trim->id_trimestre}}">{{$trim->nombre}}</option>
								@endif
							@endforeach
						</select>
					</div>
	            </div>
	            <div class="col-md-4">
		            <div class="form-group">
		            	<label for="periodo">Nombre de la Actividad</label>
		            	{!! Form::text('nombre', $actividad->nombre, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca la actividad', 'autofocus'=>'on']) !!}
		            </div>
	            </div>
	            <div class="col-md-3">
		            <div class="form-group" >
		            	<label for="trimestre">Porcentaje</label>
		            	{!! Form::number('porcentaje', $actividad->porcentaje, ['class' => 'form-control' , 'id'=>'pporcentaje', 'required' => 'required', 'placeholder'=>'Introduzca número entero...', 'autofocus'=>'on']) !!}
		            </div>
	            </div>
            </div>
            
            <div class="row">
            	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-md-offset-8">
	            	<div class="form-group">
		            	<a href="{{URL::action('ActividadController@index')}}" class="btn btn-danger">Cancelar</a>
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            </div>
	            </div>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection