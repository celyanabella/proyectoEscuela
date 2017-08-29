{!! Form::open(array('url'=>'asignacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
		<div class="input-group">
				<div class="form-group col-md-4">
						<div class="form-group">
						<label>Año de Inscripcion</label>
						<select name="idanio" class="form-control">
							@foreach ($anios as $anio)
							<option value="{{$anio->idanio}}">{{$anio->nanio}}</option>
							@endforeach
						</select>
						</div>
				</div>
		</div>
</div>
		

<div class="form-group col-md-10">
	<div class="input-group">
		<input type="number" class="form-control" name="searchYear" placeholder="Escriba el Año de matricula" value="{{$searchYear}}"><span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>
	</div>
</div>	



{{Form::close()}}

{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
			<div class="form-group">
		    //
			<button type="submit" class="btn btn-danger">Generar PDF</button>
			</div>
	{!!Form::close()!!}