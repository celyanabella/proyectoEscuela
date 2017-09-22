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



{!!Form::open(array('url'=>'docente/cvitae','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
	<legend class="the-legend"><h1 style="text-align: center;">HOJA DE VIDA</h1></legend>
</div>
	<div class="row">	

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Nombres</label>
				{!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca los nombre', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Apellidos</label>
				{!! Form::text('apellido', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza los apellidos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Fecha de Nacimiento</label>
				{!! Form::date('fechanacimiento', null, ['class' => 'form-control' , 'required' => 'required',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Sexo</label></br>
				<label>{!! Form::radio('sexo',0) !!} Femenino</label>
				<label>{!! Form::radio('sexo',1) !!} Masculino</label>
			</div> 
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Dirección</label>
				{!! Form::textarea('direccion', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza la dirección', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Telefono</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el ## telefono', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Estado Civil</label>
					{{ Form::select('id_estado', $tipos->pluck('tipo','id_estado'), null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group col-md-3">
				<label for="imagen">Fotografia</label>
	            {!! Form::file('fotografia', ['class' => 'form-control', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
					<label>Departamento de Nacimiento</label>
					{!! Form::select('id_departamento',$deptos,null,['id'=>'departamento', 'class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Municipio de Nacimiento</label>
					{!! Form::select('id_municipio',['placeholder'=>'Selecciona un depto'],null,['id'=>'municipio','class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
					<label>Otro </label>
					{!! Form::text('nacimientoextranjero', null, ['class' => 'form-control', 'placeholder'=>'Especifique el lugar de nacimiento', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
					<label>Nivel Docente</label>
					{{ Form::select('id_nivel', $niveles->pluck('nivel','id_nivel'), null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group col-md-3">
					<label>Categoría</label>
					{{ Form::select('id_categoria', $categorias->pluck('categoria','id_categoria'), null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group col-md-3">
					<label>Clase</label>
					{{ Form::select('id_clase', $clases->pluck('clase','id_clase'), null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group col-md-3">
				<label>DUI</label>
				{!! Form::number('mdui', null, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'required' => 'required',  'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label>NIP</label>
				{!! Form::number('nip', null, ['class' => 'form-control' ,'placeholder'=>'NIP...',
				 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>NIT</label>
				{!! Form::number('nit', null, ['class' => 'form-control' ,'placeholder'=>'NIT sin guiones',
				'required' => 'required', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>AFP</label>
				{!! Form::number('afp', null, ['class' => 'form-control' ,'placeholder'=>'AFP...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>INPEP</label>
				{!! Form::number('inpep', null, ['class' => 'form-control' ,'placeholder'=>'INPEP...', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Extendido</label>
				{!! Form::text('extendido', null, ['class' => 'form-control', 'placeholder'=>'Extendido...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Centro Escolar donde fue nombrado</label>
				{!! Form::text('cenombrado', null, ['class' => 'form-control', 'placeholder'=>'Introduzca el Centro Escolar', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Código</label>
				{!! Form::number('codigoinstitucion', null, ['class' => 'form-control' ,'placeholder'=>'Introduza el código', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Ingreso al sector público</label>
				{!! Form::date('fechaingresopublico', null, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Ingreso al C.E donde labora</label>
				{!! Form::date('fechalaboral', null, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Ultimo ascenso</label>
				{!! Form::date('ultimoascenso', null, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Años de servicio</label>
				{!! Form::number('aniosservicio', null, ['class' => 'form-control' ,'placeholder'=>'Introduza los años', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Próximo ascenso</label>
				{!! Form::date('proximoascenso', null, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Cargo que desempeña</label>
				{!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder'=>'Introduzca el nombre del cargo', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Principales funciones a realizar</label>
				{!! Form::textarea('funciones', null, ['class' => 'form-control', 'placeholder'=>'Introduza las funciones a realizar', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
		</div>

	</div>
</fieldset>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<a href="{{URL::action('HojaVidaController@index')}}" class="btn btn-danger col-md-4 col-md-offset-1">Cancelar</a>
            	<button class="btn btn-primary col-md-4 col-md-offset-2" type="submit">Guardar</button>
        	</div>
		</div>


{!!Form::close()!!}


@endsection