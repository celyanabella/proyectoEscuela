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



{!!Form::open(array('url'=>'expediente/matricula','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
	<legend class="the-legend"><h1 style="text-align: center;">FORMULARIO DE MATRICULA</h1></legend>
</div>
	<div class="row">

		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Fecha de Matricula</label>
				{!! Form::date('fechamatricula', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
				<label>Grado</label>
				{{ Form::select('idgrado', $grados->pluck('nombre','idgrado'), null, ['class'=>'form-control']) }}
				</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Seccion</label>
					{{ Form::select('idseccion', $secciones->pluck('nombre','idseccion'), null, ['class'=>'form-control']) }}
					</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Turno</label>
					{{ Form::select('idturno', $turnos->pluck('nombre','idturno'), null, ['class'=>'form-control']) }}
					</div>
			</div>
			

		</div>
		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-2">
				<label>Presenta Partida</label></br>
				<button class="checkbox " ><label>{!! Form::checkbox('presentapartida') !!} Sí</label></button>
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Certificado</label></br>
				<button class="checkbox " ><label>{!! Form::checkbox('certificadoprom') !!} Sí</label></button>
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Fotos</label></br>
				<button class="checkbox " ><label>{!! Form::checkbox('presentafotos') !!} Sí</label></button>
			</div>
			<div class="form-group col-md-2">
				<label>Constancia/Conducta</label></br>
				<button class="checkbox " ><label>{!! Form::checkbox('constanciaconducta') !!} Sí</label></button>
			</div>
			<div class="form-group col-md-2">
				<label>Educacion inicial</label></br>
				<button class="checkbox " ><label>{!! Form::checkbox('educacioninicial') !!} Sí</label></button>
			</div>
			<div class="form-group col-md-2">
				<label>Repite Grado</label></br>
                <button class="checkbox " ><label>{!! Form::checkbox('repitegrado') !!} Sí</label></button>
            </div>
		</div>
		</fieldset>
		<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos Generales del Estudiante</h2></legend>
			<div class="form-group col-md-3">
				<label for="">NIE</label>
				{!! Form::number('nie', 11100000, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'NIE...']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>N°. Folio partida de nacimiento</label>
				{!! Form::number('folio', 111, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Folio...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>N°. Libro partida de nacimiento</label>
				{!! Form::number('libro', 111, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Libro...', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label for="">Nombres</label>
				{!! Form::text('nombre', 111, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca los nombre', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Apellidos</label>
				{!! Form::text('apellido', 111, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza los apellidos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label for="">Fecha de Nacimiento</label>
				{!! Form::date('fechadenacimiento', null, ['class' => 'form-control' , 'required' => 'required',
				'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
	            	<label for="imagen">Fotografia</label>
	            	{!! Form::file('fotografia', ['class' => 'form-control', 'autofocus'=>'on']) !!}
            	</div>  
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-4">
				<label for="">Domicilio</label>
				{!! Form::textarea('domicilio', 111, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza la dirección', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
			<div class="form-group col-md-4">
				<label for="">Padece de alguna enfermedad</label>
				{!! Form::textarea('enfermedad', 111, ['class' => 'form-control' ,'placeholder'=>'Describa la enfermedad...', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
			<div class="form-group col-md-4">
				<label>Centro escolar del que procede</label>
			{!! Form::textarea('cePrevio', 111, ['class' => 'form-control', 'placeholder'=>'Digite el centro escolar de donde procede', 'autofocus'=>'on', 'rows'=>'2']) !!}
			</div>
		</div>



		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<label>Sexo</label></br>
				<label>{!! Form::radio('sexo',0) !!} Femenino</label>
				<label>{!! Form::radio('sexo',1) !!} Masculino</label>
			</div>
			<div class="form-group col-md-3">
				<label>¿Tiene discapacidad?</label></br>
				<label>{!! Form::radio('discapacidad',0) !!} NO</label>
				<label>{!! Form::radio('discapacidad',1) !!} SÍ</label>
			</div>
			<div class="form-group col-md-3">
				<label>Autorizacion de Vacunacion</label></br>
				<label>{!! Form::radio('autorizavacuna',0) !!} NO</label>
				<label>{!! Form::radio('autorizavacuna',1) !!} SÍ</label>
			</div>
			<div class="form-group col-md-3">
				<label>Area geográfica de residencia</label></br>
				<label>{!! Form::radio('zonahabitacion',0) !!} Urbana</label>
				<label>{!! Form::radio('zonahabitacion',1) !!} Rural</label>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos de la Madre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres de la Madre</label>
				{!! Form::text('nombre2', 111, ['class' => 'form-control' ,'placeholder'=>'Nombres Completos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos de la Madre</label>
				{!! Form::text('apellido2', 111, ['class' => 'form-control' ,'placeholder'=>'Apellidos Completos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>DUI de la Madre</label>
				{!! Form::number('dui', 1119122222, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion de la Madre</label>
					{!! Form::text('ocupacion', 111, ['class' => 'form-control' ,'placeholder'=>'Ocupacion que ejerce la madre...', 'autofocus'=>'on']) !!}
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					{!! Form::text('lugardetrabajo', 111, ['class' => 'form-control' ,'placeholder'=>'Nombre de la empresa o sitio donde actualmente trabaja', 'autofocus'=>'on']) !!}
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto  Madre</label>
					{!! Form::number('telefono', 12345678, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
				</div>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Padre</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres del Padre</label>
				{!! Form::text('nombre3', 111, ['class' => 'form-control' ,'placeholder'=>'Nombres completos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos del Padre</label>
				{!! Form::text('apellido3', 111, ['class' => 'form-control' ,'placeholder'=>'Apellidos Completos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>DUI del Padre</label>
				{!! Form::number('dui3', 1119122222, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'autofocus'=>'on']) !!}
			</div>
		</div>

		<div class="col-md-12 col-md-offset-0">
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Ocupacion del Padre</label>
					{!! Form::text('ocupacion3', 111, ['class' => 'form-control' ,'placeholder'=>'Ocupacion que que ejerce el padre', 'autofocus'=>'on']) !!}
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Lugar de trabajo</label>
					{!! Form::text('lugardetrabajo3', 111, ['class' => 'form-control' ,'placeholder'=>'Nombre de la empresa o sitio donde actualmente trabaja', 'autofocus'=>'on']) !!}
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de contacto del Padre</label>
					{!! Form::number('telefono3', 12345678, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
				</div>
			</div>
		</div>
</fieldset>

<fieldset class="well the-fieldset">
	

		<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Contacto de Emergencia</h2></legend>
			<div class="form-group col-md-3">
				<label>Nombres del Contacto Emergencia</label>
				{!! Form::text('nombre4', 111, ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Nombres Completos', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<label>Apellidos del Contacto de Emergencia</label>
				{!! Form::text('apellido4', 111, ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Describa la enfermedad...', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Telefono de Contacto de Emergencia</label>
					{!! Form::number('telefono4', 12345678, ['class' => 'form-control', 'required' => 'required' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
				</div>
			</div>	
		</div>
</fieldset>

<fieldset class="well the-fieldset">
<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h3>Tiene familiares estudiando dentro de la institución</h3></legend>
		<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="matricula">Estudiante</label>
					<select name="pid_matricula" class="form-control selectpicker" id="pid_matricula" data-Live-search="true">
						@foreach($matriculas as $matricula)
						<option value="{{ $matricula->id_matricula }}">{{$matricula->nie}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<label for="parentesco">Parentesco</label>
					<input type="text" name="pparentesco" id="pparentesco" class="form-control" placeholder="Parentesco">
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<br>
					<button type="button" id="bt_add" class="btn btn-primary" >Agregar</button>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color: #A9D0F5">
						<th>Opciones</th>
						<th>Estudiante</th>
						<th>Parentesco</th>
					</thead>
					<tfoot>
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
</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary col-md-4 col-md-offset-2" type="submit">Guardar</button>
            	<a href="{{URL::action('MatriculaController@index')}}" class="btn btn-danger col-md-4">Cancelar</a>
            </div>
		</div>
		
{!!Form::close()!!}

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
		id_matricula =$('#pid_matricula').val();
		matricula=$("#pid_matricula option:selected").text();
		parentesco =$('#pparentesco').val();

		if(id_matricula!=" " && parentesco!=""){

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_matricula[]" value="'+id_matricula+'">'+matricula+'</td><td><input type="text" name="parentesco[]" value="'+parentesco+'"></td></tr>';
			cont++;
			limpiar();
			$('#detalles').append(fila);
		}
		else{
			alert("Por favor ingrese el parentesco del estudiante");
		}
	}

	
	function limpiar(){
		$("#pparentesco").val("");
	}

	function eliminar(index){
		$("#fila"+index).remove();
		evaluar();
	}

</script>
@endpush

@endsection