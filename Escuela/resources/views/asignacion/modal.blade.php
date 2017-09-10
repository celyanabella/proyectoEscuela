<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$est->nie}}">
	{{Form::Open(array('action'=>array('AsignacionController@create'),'method'=>'create'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Nueva Asignacion</h4>
			</div>
			<div class="modal-body">
				<p>Seleccione los parametros de la asignacion de maestros</p>


                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Maestro</label>
						<select name="idmaestro" class="form-control">
							@foreach ($maestros as $maestro)
							<option value="{{$maestro->id_maestro}}">{{$maestro->nombremaestro}}</option>
							@endforeach
						</select>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Grado</label>
						<select name="idgrado" class="form-control">
							@foreach ($grados as $grado)
							<option value="{{$grado->idgrado}}">{{$grado->nombregrado}}</option>
							@endforeach
						</select>
						</div>
				</div>

                <div class="form-group col-md-4">
						<div class="form-group">
						<label>Seccion</label>
						<select name="idseccion" class="form-control">
							@foreach ($secciones as $seccion)
							<option value="{{$seccion->id_seccion}}">{{$seccion->nombreseccion}}</option>
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
							<option value="{{$turno->id_turno}}">{{$turno->nombreturno}}</option>
							@endforeach
						</select>
						</div>
				</div>

                

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>