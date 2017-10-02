@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<blockquote><h1>Listados de Estudiantes <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="tooltip" data-placement="right" title="Aqui podra generar listados de estudiantes"></i></h1></blockquote>
		@include('datos.Estudiante.search')
		
		
			<div class="form-group">
	
			<button type="submit" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="right" title="Genere un PDF listo para imprimir, asegurece de haber realizado una busqueda primero.">Generar PDF</button>
			</div>
	
		
		
	</div>
</div>

@if(Session::has('M1'))
<div class="alert alert-warning alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
  {{Session::get('M1')}}
</div>

@endif




@endsection