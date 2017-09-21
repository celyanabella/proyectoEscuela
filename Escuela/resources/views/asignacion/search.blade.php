{!! Form::open(array('url'=>'asignacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
		<div class="input-group">
				<div class="form-group col-md-8">
						<div class="form-group">
						<h5>Año de Inscripcion </h5>
						<select name="idanio" class="form-control">
							@foreach ($anios as $anio)
							<option value="{{$anio->valor}}">{{$anio->valor}}</option>
							@endforeach
						</select>
						
						</div>
				</div>
		</div>

		<div class="input-group">
				<div class="form-group col-md-8">
						<div class="form-group">
							<a><button type="submit" class="btn btn-primary">Buscar</button></a>
						</div>
				</div>
		</div>

		
</div>
{{Form::close()}}