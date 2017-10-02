@extends ('layouts.admin')
@section('contenido')
	
	
    {!!Form::model($asignacion,['method'=>'PATCH','route'=>['asignacion.update',$asignacion->id_asignacion]])!!}
	{{Form::token()}}


                <h2>Edicion Asignacion</h2>
	
				<h4>Seleccione los parametros de Actualizacion para la asignacion de maestros</h4>

	<div class="form-group col-md-2">
		<div class="form-group">
				
						<label>Año de Asignacion</label>
						<select name="idanio" class="form-control">

						
							@foreach ($anios as $anio)
							@if($asignacion->anioasignacion==$anio->valor)
							<option value="{{$anio->valor}}" selected>{{$anio->valor}}</option>
							@else
							<option value="{{$anio->valor}}">{{$anio->valor}}</option>
							@endif
							@endforeach
						</select>
						
					
		</div>
</div>

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Maestro</label>
						<select name="idmaestro" class="form-control">
							
							<option value="{{$maestro->mdui}}">{{$maestro->nombre}} {{$maestro->apellido}}</option>
						
						</select>
						</div>
				</div>

                <div class="form-group col-md-2">
						<div class="form-group">
						<label>Grado</label>
						<select name="idgrado" class="form-control">
							@foreach ($grados as $grado)
							@if($ddtgr->idgrado==$grado->idgrado)
								<option value="{{$grado->idgrado}}" selected>{{$grado->nombre}}</option>
							@else
							<option value="{{$grado->idgrado}}">{{$grado->nombre}}</option>
							@endif
							@endforeach
						</select>
						</div>
				</div>

                <div class="form-group col-md-2">
						<div class="form-group">
						<label>Seccion</label>
						<select name="idseccion" class="form-control">
							@foreach ($secciones as $seccion)
							@if($ddtgr->idseccion==$seccion->idseccion)
								<option value="{{$seccion->idseccion}}" selected>{{$seccion->nombre}}</option>
							@else
							<option value="{{$seccion->idseccion}}">{{$seccion->nombre}}</option>
							@endif
							@endforeach
						</select>
						</div>
				</div>
			

                <div class="form-group col-md-2">
						<div class="form-group">
						<label>Turno</label>
						<select name="idturno" class="form-control">
							@foreach ($turnos as $turno)
							@if($ddtgr->idturno==$turno->idturno)
							<option value="{{$turno->idturno}}" selected>{{$turno->nombre}}</option>	
							@else
							<option value="{{$turno->idturno}}">{{$turno->nombre}}</option>
							@endif
							@endforeach
						</select>
						</div>
				</div>

				

                

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
			<input name="_token" value="{{csrf_token()}}" type="hidden"></input>
            	<button class="btn btn-primary col-md-2 col-md-offset-3" type="submit">Guardar</button>
            	<a href="{{URL::action('AsignacionController@index')}}" class="btn btn-danger col-md-2 col-md-offset-1">Cancelar</a>
        	</div>
		</div>
	</div>
	{{Form::Close()}}

</div>

@endsection