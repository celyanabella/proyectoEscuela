{!! Form::open(array('url'=>'asignacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<select name="idanio" class="form-control">
			@foreach ($anios as $anio)
			<option value="{{$anio->valor}}">{{$anio->valor}}</option>
			@endforeach
		</select>

		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>			
	</div>		
</div>
{{Form::close()}}