{!! Form::open(array('url'=>'evaluacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<select name="idperiodo" class="form-control">
			@foreach ($trimestres as $trimestre)
			<option value="{{$trimestre->id_trimestre}}">{{$trimestre->nombre}}</option>
			@endforeach
		</select>

        <select name="idperiodo" class="form-control">
			@foreach ($actividades  as $actividad)
			<option value="{{$actividad->id_actividad}}">{{$actividad->nombre}}</option>
			@endforeach
		</select>

		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>			
	</div>		
</div>
{{Form::close()}}