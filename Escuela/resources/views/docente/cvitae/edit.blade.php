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

{!!Form::model($hoja,['method'=>'PATCH','route'=>['docente.cvitae.update',$hoja->id_hoja], 'files'=>'true'])!!}
{{Form::token()}}

<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h1>HOJA DE VIDA</h1></legend>
	</div>
	<div class="row">
		<aside class="col-md-9">
			<div class="form-group">
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Nombre</label>
						{!! Form::text('nombre', $maestro->nombre, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca los nombre', 'autofocus'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Apellidos</label>
						{!! Form::text('apellido', $maestro->apellido, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza los apellidos', 'autofocus'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Fecha de Nacimiento</label>
						{!! Form::date('fechanacimiento', $maestro->fechanacimiento, ['class' => 'form-control' , 'required' => 'required',
						'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
					</div>
				</div>	
			</div>
			<br><br><br>
			<div class="form-group">
				<div class="form-group">
					<div class="form-group col-md-4">
						<label>Sexo</label></br>
						@if ($maestro->sexo == 'F')
							<label>{!! Form::radio('sexo',0,true) !!} Femenino</label>
							<label>{!! Form::radio('sexo',1) !!} Masculino</label>
						@else
							<label>{!! Form::radio('sexo',0) !!} Femenino</label>
							<label>{!! Form::radio('sexo',1,true) !!} Masculino</label>
						@endif
					</div>
				</div>
				<div class="form-group ">
					<div class="form-group col-md-4">
						<label>Estado Civil</label>
						<select name="id_estado" class="form-control">
							@foreach ($estados as $est)
								@if ($est->id_estado == $maestro->id_estado)
								<option value="{{$est->id_estado}}" selected>{{$est->tipo}}</option>
								@else
								<option value="{{$est->id_estado}}">{{$est->tipo}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Teléfono</label>
						{!! Form::number('telefono', $maestro->telefono, ['class' => 'form-control', 'placeholder'=>'Teléfono...', 'autofocus'=>'on']) !!}
					</div>
				</div>		
			</div>
			<br><br><br>
			<div class="form-group">
					<div class="form-group">
						<div class="form-group col-md-4">
							<label for="">Dirección</label>
							{!! Form::textarea('direccion', $maestro->direccion, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza la dirección', 'autofocus'=>'on', 'rows'=>'2']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="form-group col-md-4">
							<label>Depto. Nacimiento</label>
							<select name="id_departamento" class="form-control">
								@foreach ($departamentos as $dep)
									@if ($dep->id_departamento == $hoja->id_departamento)
									<option value="{{$dep->id_departamento}}" selected>{{$dep->nombre}}</option>
									@else
									<option value="{{$dep->id_departamento}}">{{$dep->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group col-md-4">
							<label>Municipio de Nacimiento</label>
							<select name="id_municipio" class="form-control">
								@foreach ($municipios as $mun)
									@if ($mun->id_departamento == $hoja->id_departamento)
									<option value="{{$mun->id_municipio}}" selected>{{$mun->nombre}}</option>
									@else
									<option value="{{$mun->id_municipio}}">{{$mun->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
			</div>
		</aside>
		<aside class="col-md-3 col-xs-12 col-sm-12">
		<div class="form-group">
	    	<label for="fotografia">Fotografía</label>
		    	<input type="file" name="fotografia" class="form-control">
					@if(($maestro->fotografia)!="")
		       			<img src="{{asset('imagenes/maestros/fotos/'.$maestro->fotografia)}}" height="185px" width="213px">
		 			@endif
		</div>
		</aside>
	</div>
	<div class="row">
		<div class="col-md-12">
				<div class="form-group col-md-3">
					<label for="">Especifique lugar</label>
					{!! Form::textarea('nacimientoextranjero', $hoja->nacimientoextranjero, ['class' => 'form-control' , 'placeholder'=>'Lugar donde nació...', 'autofocus'=>'on', 'rows'=>'2']) !!}
				</div>
				<div class="form-group col-md-3">
					<label>Nivel</label>
					<select name="id_nivel" class="form-control">
						@foreach ($niveles as $niv)
							@if ($niv->id_nivel == $hoja->id_nivel)
							<option value="{{$niv->id_nivel}}" selected>{{$niv->nivel}}</option>
							@else
							<option value="{{$niv->id_nivel}}">{{$niv->nivel}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-3">
					<label>Categoría</label>
					<select name="id_categoria" class="form-control">
						@foreach ($categorias as $cat)
							@if ($cat->id_categoria == $hoja->id_categoria)
							<option value="{{$cat->id_categoria}}" selected>{{$cat->categoria}}</option>
							@else
							<option value="{{$cat->id_categoria}}">{{$cat->categoria}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-3">
					<label>Clase</label>
					<select name="id_clase" class="form-control">
						@foreach ($clases as $cla)
							@if ($cla->id_clase == $hoja->id_clase)
							<option value="{{$cla->id_clase}}" selected>{{$cla->clase}}</option>
							@else
							<option value="{{$cla->id_clase}}">{{$cla->clase}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

		<div class="col-md-12 ">
			<div class="form-group col-md-3">
				<label for="">DUI</label>
				{!! Form::number('mdui', $maestro->mdui, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Dui sin guiones', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">NIT</label>
				{!! Form::text('nit', $maestro->nit, ['class' => 'form-control', 'placeholder'=>'NIT sin guiones', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">NIP</label>
				{!! Form::text('nip', $maestro->nip, ['class' => 'form-control', 'placeholder'=>'NIP...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">AFP</label>
				{!! Form::text('afp', $maestro->afp, ['class' => 'form-control', 'placeholder'=>'AFP...', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="form-group col-md-3">
				<label for="">INPEP</label>
				{!! Form::text('inpep', $maestro->inpep, ['class' => 'form-control', 'placeholder'=>'INPEP...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Extendido</label>
				{!! Form::text('extendido', $maestro->extendido, ['class' => 'form-control' ,'placeholder'=>'Extendido...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">C.E donde fue nombrado</label>
				{!! Form::text('cenombrado', $hoja->cenombrado, ['class' => 'form-control' ,'placeholder'=>'Introduzca el C.E donde fue nombrado', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Código</label>
				{!! Form::text('codigoinstitucion',$hoja->codigoinstitucion, ['class' => 'form-control', 'placeholder'=>'codigo...', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="form-group col-md-3">
				<label for="">Ingreso al sector público</label>
				{!! Form::date('fechaingresopublico', $hoja->fechaingresopublico, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Ingreso al C.E donde labora</label>
				{!! Form::date('fechalaboral', $hoja->fechalaboral, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Ultimo ascenso</label>
				{!! Form::date('ultimoascenso', $hoja->ultimoascenso, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Años de servicio</label>
				{!! Form::number('aniosservicio', $hoja->aniosservicio, ['class' => 'form-control' ,'placeholder'=>'Introduza los años', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 ">
			<div class="form-group col-md-3">
				<label for="">Próximo ascenso</label>
				{!! Form::date('proximoascenso', $hoja->proximoascenso, ['class' => 'form-control',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Cargo que desempeña</label>
				{!! Form::text('cargo', $hoja->cargo, ['class' => 'form-control', 'placeholder'=>'Introduzca el nombre del cargo', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Principales funciones a realizar</label>
				{!! Form::textarea('funciones', $hoja->funciones, ['class' => 'form-control', 'placeholder'=>'Introduza las funciones a realizar', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
		</div>
	</div>
</fieldset>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<a href="{{URL::action('HojaVidaController@index')}}" class="btn btn-danger col-md-4">Cancelar</a>
            	<button class="btn btn-primary col-md-4 col-md-offset-2" type="submit">Guardar</button>
        	</div>
		</div>
		
{!!Form::close()!!}

@endsection