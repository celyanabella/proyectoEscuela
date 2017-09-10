@extends ('layouts.admin')
@section('contenido')
	
	
    {!!Form::model($asignacion,['method'=>'PATCH','route'=>['asignacion.update',$asignacion->id_asignacion]])!!}
	{{Form::token()}}


                <h4 class="modal-title">Edicion Asignacion</h4>
	
				<h4>Seleccione los parametros de Actualizacion para la asignacion de maestros</h4>

	<div class="form-group col-md-4">
		<div class="form-group">
				
						<label>Año de Asignacion</label>
						<select name="idanio" class="form-control">
							@foreach ($anios as $anio)
							<option value="{{$anio->valor}}">{{$anio->valor}}</option>
							@endforeach
						</select>
						
					
		</div>
</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Maestro</label>
						<select name="idmaestro" class="form-control">
							
							<option value="{{$maestro->mdui}}">{{$maestro->nombre}} {{$maestro->apellido}}</option>
						
						</select>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Grado</label>
						<select name="idgrado" class="form-control">
							@foreach ($grados as $grado)
							<option value="{{$grado->idgrado}}">{{$grado->nombre}}</option>
							@endforeach
						</select>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Seccion</label>
						<select name="idseccion" class="form-control">
							@foreach ($secciones as $seccion)
							<option value="{{$seccion->idseccion}}">{{$seccion->nombre}}</option>
							@endforeach
						</select>
						</div>
				</div>
			</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Turno</label>
						<select name="idturno" class="form-control">
							@foreach ($turnos as $turno)
							<option value="{{$turno->idturno}}">{{$turno->nombre}}</option>
							@endforeach
						</select>
						</div>
				</div>

                

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary col-md-4 col-md-offset-2" type="submit">Guardar</button>
            	<a href="{{URL::action('AsignacionController@index')}}" class="btn btn-danger col-md-4">Cancelar</a>
        	</div>
		</div>
	</div>
	{{Form::Close()}}

</div>

@endsection