@extends ('layouts.admin')
@section('contenido')
	
	
    {!!Form::model($asignacion,['method'=>'PATCH','route'=>['asignacion.materia.update',$asignacion->id_detalleasignacion]])!!}
	{{Form::token()}}


                <h4 class="modal-title">Edicion Materias</h4>
	
				<h4>Seleccione una materia para el siguiente docente</h4>

	<div class="form-group col-md-3">
		<div class="form-group">
				
						<label>Año de Asignacion</label>
                        <p>{{$anio}}</p>
						
					
		</div>
</div>

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Maestro</label>
                        <p>{{$maestro->nombre}} {{$maestro->apellido}}</p>
						</div>
				</div>

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Grado</label>
                        <p>{{$grado->nombre}}</p>

						</div>
				</div>

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Seccion</label>
                        <p>{{$seccion->nombre}}</p>
						</div>
				</div>
			

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Turno</label>
                        <p>{{$turno->nombre}}</p>
						</div>
				</div>

                <div class="form-group col-md-3">
						<div class="form-group">
						<label>Materias</label>
						<select name="idm" class="form-control">
							@foreach ($materias as $materia)
							<option value="{{$materia->id_materia}}">{{$materia->nombre}}</option>
							@endforeach
						</select>
						</div>
				</div>

				<div class="form-group col-md-3">
						<div class="form-group">
						<label>Es coordinador <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Haga CHECK si el docente sera el coordinador del grado actual"></i></label>
                        <button class="checkbox " ><label>{!! Form::checkbox('coordina') !!} </label></button>
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