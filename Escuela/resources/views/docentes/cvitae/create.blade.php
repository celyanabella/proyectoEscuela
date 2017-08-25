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



{!!Form::open(array('url'=>'docentes/cvitae','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
	<legend class="the-legend"><h1 style="text-align: center;">DATOS DE IDENTIFICACION</h1></legend>
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
				{!! Form::date('fechadenacimiento', null, ['class' => 'form-control' , 'required' => 'required',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Sexo</label></br>
				<label>{!! Form::radio('sexo',0) !!} Femenino</label>
				<label>{!! Form::radio('sexo',1) !!} Masculino</label>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-6">
				<label for="">Dirección</label>
				{!! Form::textarea('direccion', null, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza la dirección', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Telefono</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el ## telefono', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Estado Civil</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
					<label>Departamento de Nacimiento</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Municipio de Nacimiento</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-6">
					<label>Otro </label>
					{!! Form::text('nacimientoextranjero', null, ['class' => 'form-control', 'placeholder'=>'Especifique el lugar de nacimiento', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
					<label>Nivel Docente</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Categoría</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
					<label>Clase</label>
					{!! Form::number('telefono', null, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>DUI</label>
				{!! Form::number('dui', null, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'required' => 'required',  'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label>NIP</label>
				{!! Form::number('nip', null, ['class' => 'form-control' ,'placeholder'=>'NIP...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>NIT</label>
				{!! Form::number('nit', null, ['class' => 'form-control' ,'placeholder'=>'NIT sin guiones', 'autofocus'=>'on']) !!}
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

<fieldset class="well the-fieldset">
	<div class="col-md-12">
		<legend class="the-legend"><h3>Estudios Realizados</h3></legend>
	</div>

	<div class="col-md-12">	
		<div class="panel panel-primary">
			<div class="panel-body">
					<h3>Estudios academicos del docente</h3><span><p>(después del bachillerato)</p></span>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="institucion">Institución</label>
							<input type="text" name="pinstitucionrealizada" id="pinstitucionrealizada" class="form-control" placeholder="Introduzca la Institución">
						</div>
						<div class="form-group col-md-2">
							<label for="clase">Clase</label>
							<input type="text" name="ptipoclase" id="ptipoclase" class="form-control" placeholder="Introduzca la clases">
						</div>
						<div class="form-group col-md-3">
							<label for="clase">Especialidad</label>
							<input type="text" name="pespecialidad" id="pespecialidad" class="form-control" placeholder="Introduzca la especialidad">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia0">Copia</label>
							<input type="file" name="pcopia0" id="pcopia0"  class="form-control" placeholder="Introduzca la copia">
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn"><button type="button" id="bt_del"  class="btn btn-danger">Limpiar</button><button type="button" id="bt_add" class="btn btn-info">Agregar</button></span>
							</div>
						</div>
					</div>	
				<div class="table-responsive">
					<table id="detalles0" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: #A9D0F5">
							<th>Opciones</th>
							<th>Institución</th>
							<th>Clase</th>
							<th>Especialidad</th>
							<th>Copia</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>		
			</div>
		</div>
	</div>
</fieldset>


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
							<input type="text" name="paniocapacitacion" id="paniocapacitacion" class="form-control" placeholder="Introduzca el año">
						</div>
						<div class="form-group col-md-8">
							<label for="nombrecapacitacion">Nombre de la capacitación recibida</label>
							<input type="text" name="pnombrecapacitacion" id="pnombrecapacitacion" class="form-control" placeholder="Introduzca el nombre cap. recibida">
						</div>
						<div class="form-group col-md-2">
							<label for="horas">Horas</label>
							<input type="text" name="phoras" id="phoras" class="form-control" placeholder="Introduzca las horas">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia1">Copia</label>
							<input type="file" name="pcopia1" id="pcopia1"  class="form-control" placeholder="Introduzca la copias">
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn"><button type="button" id="bt_del1"  class="btn btn-danger">Limpiar</button><button type="button" id="bt_add1" class="btn btn-info">Agregar</button></span>
							</div>
						</div>
					</div>	
				<div class="table-responsive">
					<table id="detalles1" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: #A9D0F5">
							<th>Opciones</th>
							<th>Año</th>
							<th>Nombre de la capacitación</th>
							<th>Horas</th>
							<th>Copia</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>		
			</div>
		</div>
	</div>
</fieldset>

<fieldset class="well the-fieldset">
	<div class="col-md-12">
		<legend class="the-legend"><h3>Recórd Laboral</h3></legend>
	</div>

	<div class="col-md-12">	
		<div class="panel panel-primary">
			<div class="panel-body">
					<h3>Instituciones donde trabajo anteriormente</h3>
					<div class="row"> 
						<div class="form-group col-md-8">
							<label for="cargo">Cargo</label>
							<input type="text" name="pcargo" id="pcargo" class="form-control" placeholder="Cargo...">
						</div>
						<div class="form-group col-md-2">
							<label for="lugarrecordlaboral">Lugar de trabajo</label>
							<input type="text" name="plugarrecordlaboral" id="plugarrecordlaboral" class="form-control" placeholder="Lugar de trabajo...">
						</div>
						<div class="form-group col-md-2">
							<label for="tiempo">Tiempo</label>
							<input type="text" name="ptiempo" id="ptiempo" class="form-control" placeholder="Duracion del trabajo">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="copia2">Copia</label>
							<input type="file" name="pcopia2" id="pcopia2"  class="form-control" placeholder="Introduzca la copia">
						</div>
						<div class="form-group col-md-5">
							<label for="acciones">Acciones</label>
							<div class="input-group">
								<input type="text" class="form-control" disabled placeholder="Seleccione una opción"><span class="input-group-btn"><button type="button" id="bt_del2"  class="btn btn-danger">Limpiar</button><button type="button" id="bt_add2" class="btn btn-info">Agregar</button></span>
							</div>
						</div>
					</div>	
				<div class="table-responsive">
					<table id="detalles2" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: #A9D0F5">
							<th>Opciones</th>
							<th>Cargo</th>
							<th>Lugar de trabajo</th>
							<th>Tiempo</th>
							<th>Copia</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>		
			</div>
		</div>
	</div>
</fieldset>


{!!Form::close()!!}

@push('scripts')
<script>

	$(document).ready(function(){
		$('#bt_del').click(function(){
			limpiar();
		});
	});

	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});

	var cont = 0;
	//$('#guardar').hide(); //Botón guardar inicialmente oculto

	function agregar(){
		institucionrealizada =$('#pinstitucionrealizada').val();
		tipoclase =$('#ptipoclase').val();
		especialidad =$('#pespecialidad').val();
		copia0 =$('#pcopia0').val();

		if(institucionrealizada!="" && tipoclase!="" && especialidad!="" && copia0!=""){

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="text" name="institucionrealizada[]" value="'+institucionrealizada+'"></td><td><input type="text" name="tipoclase[]" value="'+tipoclase+'"></td><td><input type="text" name="especialidad[]" value="'+especialidad+'"></td><td><input type="text" name="copia0[]" value="'+copia0+'"></td></tr>';
			cont++;
			limpiar();
			$('#detalles0').append(fila);
		}
		else{
			alert("Por favor ingrese los datos de los Estudios Realizados");
		}
	}

	
	function limpiar(){
		$("#pinstitucionrealizada").val("");
		$("#ptipoclase").val("");
		$("#pespecialidad").val("");
		$("#pcopia0").val("");
	}

	function eliminar(index){
		$("#fila"+index).remove();
		evaluar();
	}  


</script>
@endpush

@endsection