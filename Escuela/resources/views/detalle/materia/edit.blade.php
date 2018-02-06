@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Materia: {{ $materia->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($materia,['method'=>'PATCH','route'=>['detalle.materia.update',$materia->id_materia]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Codigo</label>
            	<input type="Number" name="codigo" class="form-control" value="{{$materia->codigo}}" placeholder="codigo...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$materia->nombre}}" placeholder="Nombre...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{URL::action('MateriaController@index')}}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection