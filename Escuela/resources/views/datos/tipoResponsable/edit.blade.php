@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría: {{ $tipo->nombretipo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tipo,['method'=>'PATCH','route'=>['datos.tipoResponsable.update',$tipo->idresponsable]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombretipo" class="form-control" value="{{$tipo->nombretipo}}" placeholder="Nombre...">
            </div>
            
            <div class="form-group">
            	<a href="{{URL::action('TipoResponsableController@index')}}" class="btn btn-danger">Cancelar</a>
            	<button class="btn btn-primary" type="submit">Guardar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection