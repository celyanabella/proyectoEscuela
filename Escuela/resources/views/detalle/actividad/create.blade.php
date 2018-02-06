
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Actividad</h3>


			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif


			{!!Form::open(array('url'=>'detalle/actividad','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">
            	<div class="col-md-3" >
		            <div class="form-group" >
		            	<label for="trimestre">Seleccione el Trimestre</label>
		            	{{ Form::select('id_trimestre', $trimestres->pluck('nombre','id_trimestre'), null, ['class'=>'form-control']) }}
		            </div>
	            </div>
	            <div class="col-md-4">
		            <div class="form-group">
		            	<label for="periodo">Nombre de la Actividad</label>
		            	{!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca la actividad', 'autofocus'=>'on']) !!}
		            </div>
	            </div>
	            <div class="col-md-3">
		            <div class="form-group" >
		            	<label for="trimestre">Porcentaje</label>
		            	{!! Form::number('porcentaje', null, ['class' => 'form-control' , 'id'=>'pporcentaje', 'required' => 'required', 'placeholder'=>'Introduzca número entero...', 'autofocus'=>'on']) !!}
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

@push('scripts')
<script>

	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont = 0;
	//$('#guardar').hide(); //Botón guardar inicialmente oculto

	function agregar(){
		numero =$('#pporcentaje').val();

		function esEntero(numero){
		    if (isNaN(numero)){
		        alert ("Ups... " + numero + " no es un número.");
		    }
		    else{
		        if (numero % 1 == 0) {
		            alert ("Es un numero entero");
		        }
		        else{
		            alert ("Es un numero decimal");
		        }
		    }
		}
	}


</script>
@endpush
@endsection