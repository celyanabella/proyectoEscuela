{!! Form::open(array('url'=>'asignacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
		<div class="input-group">
				<div class="form-group col-md-8">
						<div class="form-group">
						<label>Año de Inscripcion</label>
						<select name="idanio" class="form-control">
							@foreach ($anios as $anio)
							<option value="{{$anio->valor}}">{{$anio->valor}}</option>
							@endforeach
						</select>
						
						</div>
				</div>
		</div>
</div>

<div class="form-group col-md-10">
	<div class="input-group">
		<span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>
	</div>
</div>	
		

{{Form::close()}}