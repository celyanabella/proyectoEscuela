{!! Form::open(array('url'=>'datos/Estudiante','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchNombre" placeholder="Escriba el Nombre" value="{{$searchNombre}}">
		<input type="text" class="form-control" name="searchText" placeholder="Escriba el Apellido" value="{{$searchText}}">
		<input type="text" class="form-control" name="searchNie" placeholder="Escriba el nie" value="{{$searchNie}}">
		
		<div class="col-md-12">
			
			<div class="form-group col-md-3">
				<div class="form-group">
				<label>Grado</label>
				<select name="idgrado" class="form-control">
					@foreach ($grados as $gr)
					<option  value="{{$gr->idgrado}}">{{$gr->nombre}}</option>
					@endforeach
				</select>
				</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Seccion</label>
					<select name="idseccion" class="form-control">
						@foreach ($secciones as $ss)
						<option value="{{$ss->idseccion}}">{{$ss->nombre}}</option>
						@endforeach
					</select>
					</div>
			</div>
			<div class="form-group col-md-3">
					<div class="form-group">
					<label>Turno</label>
					<select name="idturno" class="form-control">
						@foreach ($turnos as $tu)
						<option value="{{$tu->idturno}}">{{$tu->nombre}}</option>
						@endforeach
					</select>
					</div>
			</div>
		</div>

	</div>
</div>

<div class="form-group">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</div>

{{Form::close()}}