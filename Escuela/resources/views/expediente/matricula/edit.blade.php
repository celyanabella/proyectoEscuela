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

{!!Form::model($matricula,['method'=>'PATCH','route'=>['expediente.matricula.update',$matricula->id_matricula], 'files'=>'true'])!!}
{{Form::token()}}


<fieldset class="well the-fieldset">
	<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
		<legend class="the-legend"><h1>FORMULARIO DE MATRICULA</h1></legend>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group col-md-3">
				<label for="">Fecha de Matricula</label>
				{!! Form::date('fechamatricula', $matricula->fechamatricula, ['class' => 'form-control', 'autofocus'=>'on']) !!}
			</div>
			<div class="form-group col-md-3">
				<div class="form-group">
					<label>Grado</label>
					<select name="idgrado" class="form-control">
						@foreach ($grados as $gr)
							@if ($gr->idgrado == $detalleg->idgrado)
							<option value="{{$gr->idgrado}}" selected>{{$gr->nombre}}</option>
							@else
							<option value="{{$gr->idgrado}}">{{$gr->nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
						<label>Seccion</label>
						<select name="idseccion" class="form-control">
						@foreach ($secciones as $ss)
							@if ($ss->idseccion == $detalleg->idseccion)
							<option value="{{$ss->idseccion}}" selected>{{$ss->nombre}}</option>
							@else
							<option value="{{$ss->idseccion}}">{{$ss->nombre}}</option>
							@endif
						@endforeach
						</select>
					</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
						<label>Turno</label>
						<select name="idturno" class="form-control">
						@foreach ($turnos as $tu)
							@if ($tu->idturno == $detalleg->idturno)
							<option value="{{$tu->idturno}}" selected>{{$tu->nombre}}</option>
							@else
							<option value="{{$tu->idturno}}">{{$tu->nombre}}</option>
							@endif
						@endforeach
						</select>
					</div>
			</div>
		</div> 
		<div class="col-md-12">
			<div class="form-group col-md-2">
				<label>Presenta Partida</label></br>
				@if ($matricula->presentapartida == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('presentapartida',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('presentapartida',1,false) !!} SI</label></button>
				@endif
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Certificado</label></br>
				@if ($matricula->certificadoprom == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('certificadoprom',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('certificadoprom',1,false) !!} SI</label></button>
				@endif
			</div>
			<div class="form-group col-md-2">
				<label>Presenta Fotos</label></br>
				@if ($matricula->presentafotos == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('presentafotos',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('presentafotos',1,false) !!} SI</label></button>
				@endif
			</div>
			<div class="form-group col-md-2">
				<label>Constancia/Conducta</label></br>
				@if ($matricula->constanciaconducta == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('constanciaconducta',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('constanciaconducta',1,false) !!} SI</label></button>
				@endif
			</div>
			<div class="form-group col-md-2">
				<label>Educacion inicial</label></br>
				@if ($matricula->educacioninicial == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('educacioninicial',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('educacioninicial',1,false) !!} SI</label></button>
				@endif
			</div>
			<div class="form-group col-md-2">
				<label>Repite Grado</label></br>
				@if ($matricula->repitegrado == 'SI')
					<button class="checkbox " ><label>{!! Form::checkbox('repitegrado',1,true) !!} Sí</label></button>
				@else
					<button class="checkbox " ><label>{!! Form::checkbox('repitegrado',1,false) !!} SI</label></button>
				@endif
            </div>
		</div>
	</div>
</fieldset>

<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos Generales del Estudiante</h2></legend>
	</div>
	<div class="row">
		<aside class="col-md-9">
			<div class="form-group">
				<div class="form-group">
					<div class="col-md-4">
							<label for="">NIE</label>
							{!! Form::number('nie', $matricula->nie, ['class' => 'form-control' ,  'required' => 'required', 'placeholder'=>'NIE...', 'disabled'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4">
						<label>N°. Folio partida de nacimiento</label>
						{!! Form::number('folio', $detallepartida->folio, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Folio...', 'autofocus'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4">
						<label>N°. Libro partida de nacimiento</label>
						{!! Form::number('libro', $detallepartida->libro, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Libro...', 'autofocus'=>'on']) !!}
					</div>
				</div>
			</div>
			<br><br><br>
			<div class="form-group">
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Nombres</label>
						{!! Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduzca los nombre', 'autofocus'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Apellidos</label>
						{!! Form::text('apellido', $estudiante->apellido, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza los apellidos', 'autofocus'=>'on']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Fecha de Nacimiento</label>
						{!! Form::date('fechadenacimiento', $estudiante->fechadenacimiento, ['class' => 'form-control' , 'required' => 'required',
						'placeholder'=>'AAAA-MM-DD', 'autofocus'=>'on']) !!}
					</div>
				</div>		
			</div>
			<br><br><br>
			<div class="form-group">
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Domicilio</label>
						{!! Form::textarea('domicilio', $estudiante->domicilio, ['class' => 'form-control' , 'required' => 'required', 'placeholder'=>'Introduza la dirección', 'autofocus'=>'on', 'rows'=>'2']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label for="">Padece de alguna enfermedad</label>
						{!! Form::textarea('enfermedad', $estudiante->enfermedad, ['class' => 'form-control' ,'placeholder'=>'Describa la enfermedad...', 'autofocus'=>'on', 'rows'=>'2']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-md-4">
						<label>Centro escolar del que procede</label>
						{!! Form::textarea('cePrevio', $matricula->cePrevio, ['class' => 'form-control', 'placeholder'=>'Digite el centro escolar de donde procede', 'autofocus'=>'on', 'rows'=>'2']) !!}
					</div>
				</div>
			</div>
		</aside>
		<aside class="col-md-3 col-xs-12 col-sm-12">
		<div class="form-group">
	    	<label for="fotografia">Fotografia</label>
		    	<input type="file" name="fotografia" class="form-control">
					@if(($matricula->fotografia)!="")
		       			<img src="{{asset('imagenes/alumnos/'.$matricula->fotografia)}}" height="185px" width="213px">
		 			@endif
		</div>
		</aside>
	</div>

<div class="row">
	<div class="col-md-12 ">
		<div class="form-group col-md-3">
			<label>Sexo</label></br>
				@if ($estudiante->sexo == 'F')
					<label>{!! Form::radio('sexo',0,true) !!} Femenino</label>
					<label>{!! Form::radio('sexo',1) !!} Masculino</label>
				@else
					<label>{!! Form::radio('sexo',0) !!} Femenino</label>
					<label>{!! Form::radio('sexo',1,true) !!} Masculino</label>
				@endif
		</div>
		<div class="form-group col-md-3">
			<label>¿Tiene discapacidad?</label></br>
			@if ($estudiante->discapacidad == 'SI')
				<label>{!! Form::radio('discapacidad',1,true) !!} SI</label>
				<label>{!! Form::radio('discapacidad',0) !!} NO</label>
			@else
				<label>{!! Form::radio('discapacidad',1) !!} SI</label>
				<label>{!! Form::radio('discapacidad',0,true) !!} NO</label>
			@endif
		</div>
		<div class="form-group col-md-3">
			<label>Autorizacion de Vacunacion</label></br>
			@if ($estudiante->autorizavacuna == "SI")
				<label>{!! Form::radio('autorizavacuna',1,true) !!} SI</label>
				<label>{!! Form::radio('autorizavacuna',0) !!} NO</label>
			@else
				<label>{!! Form::radio('autorizavacuna',1,false) !!} SI</label>
				<label>{!! Form::radio('autorizavacuna',0,true) !!} NO</label>
			@endif
		</div>
		<div class="form-group col-md-3">
			<label>Area geográfica de residencia</label></br>
			@if ($estudiante->zonahabitacion == 'Urbano')
				<label>{!! Form::radio('zonahabitacion',0,true) !!} Urbano</label>
				<label>{!! Form::radio('zonahabitacion',1) !!} Rural</label>
			@else
				<label>{!! Form::radio('zonahabitacion',0,false) !!} Urbano</label>
				<label>{!! Form::radio('zonahabitacion',1,true) !!} Rural</label>
			@endif
		</div>
	</div>
</div>
</fieldset>


<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos de la Madre</h2></legend>
	</div>

	<div class="col-md-12 col-md-offset-0">
		
		<div class="form-group col-md-3">
			<label>Nombres de la Madre</label>
			{!! Form::text('nombre2', $detalleM->nombre, ['class' => 'form-control' ,'placeholder'=>'Nombres Completos', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>Apellidos de la Madre</label>
			{!! Form::text('apellido2', $detalleM->apellido, ['class' => 'form-control' ,'placeholder'=>'Apellidos Completos', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>DUI de la Madre</label>
			{!! Form::number('dui', $detalleM->dui, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'autofocus'=>'on']) !!}
		</div>
	</div>

	<div class="col-md-12 col-md-offset-0">
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Ocupacion de la Madre</label>
				{!! Form::text('ocupacion', $detalleM->ocupacion, ['class' => 'form-control' ,'placeholder'=>'Ocupacion que ejerce la madre...', 'autofocus'=>'on']) !!}
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Lugar de trabajo</label>
				{!! Form::text('lugardetrabajo', $detalleM->lugardetrabajo, ['class' => 'form-control' ,'placeholder'=>'Nombre de la empresa o sitio donde actualmente trabaja', 'autofocus'=>'on']) !!}
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Telefono de contacto  Madre</label>
				{!! Form::number('telefono', $detalleM->telefono, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
		</div>
	</div>
</fieldset>

<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Padre</h2></legend>
	</div>
	<div class="col-md-12 col-md-offset-0">
		<div class="form-group col-md-3">
			<label>Nombres del Padre</label>
			{!! Form::text('nombre3', $detalleP->nombre, ['class' => 'form-control' ,'placeholder'=>'Nombres completos', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>Apellidos del Padre</label>
			{!! Form::text('apellido3', $detalleP->apellido, ['class' => 'form-control' ,'placeholder'=>'Apellidos Completos', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>DUI del Padre</label>
			{!! Form::number('dui3', $detalleP->dui, ['class' => 'form-control' ,'placeholder'=>'DUI sin guiones', 'autofocus'=>'on']) !!}
		</div>
	</div>

	<div class="col-md-12 col-md-offset-0">
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Ocupacion del Padre</label>
				{!! Form::text('ocupacion3', $detalleP->ocupacion, ['class' => 'form-control' ,'placeholder'=>'Ocupacion que que ejerce el padre', 'autofocus'=>'on']) !!}
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Lugar de trabajo</label>
				{!! Form::text('lugardetrabajo3', $detalleP->lugardetrabajo, ['class' => 'form-control' ,'placeholder'=>'Nombre de la empresa o sitio donde actualmente trabaja', 'autofocus'=>'on']) !!}
			</div>
		</div>
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Telefono de contacto del Padre</label>
				{!! Form::number('telefono3', $detalleP->telefono, ['class' => 'form-control' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
		</div>
	</div>
</fieldset>

<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h2>Datos del Contacto de Emergencia</h2></legend>
	</div>

	<div class="col-md-12 col-md-offset-0">
		<div class="form-group col-md-3">
			<label>Nombres del Contacto Emergencia</label>
			{!! Form::text('nombre4', $detalleC->nombre, ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Nombres Completos', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>Apellidos del Contacto de Emergencia</label>
			{!! Form::text('apellido4', $detalleC->apellido, ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Describa la enfermedad...', 'autofocus'=>'on']) !!}
		</div>
		<div class="form-group col-md-3">
			<div class="form-group">
				<label>Telefono de Contacto de Emergencia</label>
				{!! Form::number('telefono4', $detalleC->telefono, ['class' => 'form-control', 'required' => 'required' , 'placeholder'=>'Introduza el telefono de contacto', 'autofocus'=>'on']) !!}
			</div>
		</div>	
	</div>
</fieldset>

<fieldset class="well the-fieldset">
	<div class="col-md-12 col-md-offset-0">
		<legend class="the-legend"><h3>Tiene familiares estudiando dentro de la institución</h3></legend>
	</div>
	<div class="col-md-12 col-md-offset-0">	
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