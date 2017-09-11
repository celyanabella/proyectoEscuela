@extends ('layouts.admin')
@section('contenido')
	
	
    {!!Form::model($asignacion,['method'=>'PATCH','route'=>['asignacion.materia.update',$asignacion->id_asignacion]])!!}
	{{Form::token()}}


                <h4 class="modal-title">Edicion Materias</h4>
	
				<h4>Seleccione una materia para el siguiente docente</h4>

	<div class="form-group col-md-4">
		<div class="form-group">
				
						<label>Año de Asignacion</label>
                        <p>{{$anio}}</p>
						
					
		</div>
</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Maestro</label>
                        <a>{{$maestro->nombre}} {{$maestro->apellido}}</a>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Grado</label>
                        <a>{{$grado->nombre}}</a>

						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Seccion</label>
                        <a>{{$seccion->nombre}}</a>
						</div>
				</div>
			</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Turno</label>
                        <a>{{$turno->nombre}}</a>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Materias</label>
						<select name="idm" class="form-control">
							@foreach ($materias as $materia)
							<option value="{{$materia->id_materia}}">{{$materia->nombre}}</option>
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