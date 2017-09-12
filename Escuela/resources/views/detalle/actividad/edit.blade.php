@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Actividad: {{ $actividad->periodo}}</h3>
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
            <div class="form-group">
            	<label for="periodo">Periodo</label>
            	<input type="text" name="periodo" class="form-control" value="{{$actividad->periodo}}" placeholder="periodo...">
            </div>
            <div class="form-group">
            	<label for="porcentaje(%)">Porcentaje</label>
            	<input type="Number" name="porcentaje" class="form-control" value="{{$actividad->porcentaje}}" placeholder="Porcentaje...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{URL::action('ActividadController@index')}}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection