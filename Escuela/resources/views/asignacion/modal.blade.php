<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	{!!Form::open(array('url'=>'asignacion','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}



	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Nueva Asignacion</h4>
				<h4>Seleccione los parametros de la asignacion de maestros</h4>
			</div>
			<div class="modal-body">
				

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
							@foreach ($maestros as $maestro)
							<option value="{{$maestro->mdui}}">{{$maestro->nombre}} {{$maestro->apellido}}</option>
							@endforeach
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

                

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>