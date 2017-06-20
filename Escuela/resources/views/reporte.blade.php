<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{!! Form::open(['action' =>'ReporteController@store','class'=>'form-center' ]) !!}
	<input type="text" name="grado" placeholder="grado">
	<input type="text" name="seccion" placeholder="seccion">
	<input type="text" name="turno" placeholder="turno">

	<button type="submit">Enviar Datos</button>
	{!!Form::close()!!}
</body>
</html>