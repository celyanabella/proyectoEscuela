@extends('layouts.admin')
@section('contenido')

<fieldset class="well the-fieldset" style="border:6px groove #ccc; background:#F8ECE0;">

	<div class="row">
    
        <div class="timeline-centered">

	        <article class="timeline-entry">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon bg-success">
	                    <i class="entypo-feather"></i>
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Datos de Matrícula</a></h2>
	                     <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
		       							<img src="{{asset('imagenes/alumnos/logo.png')}}">
					                </figure>
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	<aside class="col-md-3">
					                	<b>Fecha Matricula</b><h5>{{$matricula->fechamatricula}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Estado</b><h5>{{$matricula->estado}}</h5>
					                </aside>   
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Turno</b><h5>{{$turno->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Grado</b><h5>{{$grado->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Sección</b><h5>{{$seccion->nombre}}</h5>
					                </aside>  
					            </div>
					            <br><br><br>
					            <div class="col-sm-6 col-md-8">
					            	 <aside class="col-md-3">
					                	<b>Presentó Partida</b><h5>{{$matricula->presentapartida}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Presentó Fotos</b><h5>{{$matricula->presentafotos}}</h5>
					                </aside>
					                <aside class="col-md-4">
					                	<b>Presentó Certificado</b><h5>{{$matricula->certificadoprom}}</h5>
					                </aside>   
					            </div>
					            <br><br><br>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Educación Inicial</b><h5>{{$matricula->educacioninicial}}</h5>
					                </aside> 
					                <aside class="col-md-3">
					                	<b>Repite Grado</b><h5>{{$matricula->repitegrado}}</h5>
					                </aside>
					                <aside class="col-md-4">
					                	<b>Constancia de Conducta</b><h5>{{$matricula->constanciaconducta}}</h5>
					                </aside>
					            </div>
					        </div>
	                    
	                </div>
	            </div>

	        </article>


	        <article class="timeline-entry">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon bg-secondary">
	                    <i class="entypo-suitcase"></i>
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Datos del Estudiante</a></h2>
	                    
					        <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
	    									<label for="fotografia">Fotografia</label>
												@if(($matricula->fotografia)!="")
		       										<img src="{{asset('imagenes/alumnos/'.$matricula->fotografia)}}">
		       									@elseif($estudiante->sexo=="F")
		       											<img src="{{asset('imagenes/alumnos/e1.png')}}">
		       										@else
		       										 <img src="{{asset('imagenes/alumnos/e2.png')}}">
		 										@endif
					                </figure>
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	<aside class="col-md-3">
					                	<b>NIE</b><h5>{{$estudiante->nie}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>N°. Folio</b><h5>{{$detallepartida->folio}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>N°. Libro</b><h5>{{$detallepartida->libro}}</h5>
					                </aside>  
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	 <aside class="col-md-3">
					                	<b>Nombre</b><h5>{{$estudiante->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Apellido</b><h5>{{$estudiante->apellido}}</h5>
					                </aside>
					                <aside class="col-md-5">
					                	<b>Fecha de Nacimiento</b><h5>{{$estudiante->fechadenacimiento}}</h5>
					                </aside>   
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Sexo</b><h5>{{$estudiante->sexo}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Área Geográfica</b><h5>{{$estudiante->zonahabitacion}}</h5>
					                </aside> 
					                <aside class="col-md-5">
					                	<b>Domicilio</b><h5>{{$estudiante->domicilio}}</h5>
					                </aside>
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Enfermedad</b><h5>{{$estudiante->enfermedad}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Discapacidad</b><h5>{{$estudiante->discapacidad}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Autoriza Vacuna</b><h5>{{$estudiante->autorizavacuna}}</h5>
					                </aside>   
					            </div>
					        </div>
	                </div>
	            </div>

	        </article>


	        <article class="timeline-entry">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon bg-info">
	                    <i class="entypo-location"></i>
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Datos de la Madre</a></h2>

	                    <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
		       							<img src="{{asset('imagenes/alumnos/m1.png')}}">
					                </figure>
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	<aside class="col-md-3">
					                	<blockquote>Perfil</blockquote>
					                </aside>  
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Nombre</b><h5>{{$detalleM->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Apellido</b><h5>{{$detalleM->apellido}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Dui</b><h5>{{$detalleM->dui}}</h5>
					                </aside>  
					            </div>
					            <br><br><br>
					            <div class="col-sm-6 col-md-8">
					            	 <aside class="col-md-3">
					                	<b>Ocupación</b><h5>{{$detalleM->ocupacion}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Lugar de Trabajo</b><h5>{{$detalleM->lugardetrabajo}}</h5>
					                </aside>
					                <aside class="col-md-4">
					                	<b>Telefono</b><h5>{{$detalleM->telefono}}</h5>
					                </aside>   
					            </div>
					    </div>


	        </article>


	        <article class="timeline-entry">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon bg-warning">
	                    <i class="entypo-camera"></i>
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Datos del Padre</a></h2>

	                    
	                    <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
		       							<img src="{{asset('imagenes/alumnos/p1.png')}}">
					                </figure>
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	<aside class="col-md-3">
					                	<blockquote>Perfil</blockquote>
					                </aside>  
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Nombre</b><h5>{{$detalleP->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Apellido</b><h5>{{$detalleP->apellido}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Dui</b><h5>{{$detalleP->dui}}</h5>
					                </aside>  
					            </div>
					            <br><br><br>
					            <div class="col-sm-6 col-md-8">
					            	 <aside class="col-md-3">
					                	<b>Ocupación</b><h5>{{$detalleP->ocupacion}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Lugar de Trabajo</b><h5>{{$detalleP->lugardetrabajo}}</h5>
					                </aside>
					                <aside class="col-md-4">
					                	<b>Telefono</b><h5>{{$detalleP->telefono}}</h5>
					                </aside>   
					            </div>
					    </div>
	                </div>
	            </div>

	        </article>


	        <article class="timeline-entry begin">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
	                    <i class="entypo-flight"></i> +
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Contacto de Emergencia</a></h2>
	                    <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
		       							<img src="{{asset('imagenes/alumnos/c1.png')}}">
					                </figure>
					            </div>
					            <div class="col-sm-6 col-md-8">
					            	<aside class="col-md-3">
					                	<blockquote>Perfil</blockquote>
					                </aside>  
					            </div>
					            <div class="col-sm-6 col-md-8">
					                <aside class="col-md-3">
					                	<b>Nombre</b><h5>{{$detalleC->nombre}}</h5>
					                </aside>
					                <aside class="col-md-3">
					                	<b>Apellido</b><h5>{{$detalleC->apellido}}</h5>
					                </aside>
					                <aside class="col-md-4">
					                	<b>Telefono</b><h5>{{$detalleC->telefono}}</h5>
					                </aside>  
					            </div>
					    </div>
	                </div>


	            </div>

	        </article>

	        <article class="timeline-entry">

	            <div class="timeline-entry-inner">

	                <div class="timeline-icon bg-secondary">
	                    <i class="entypo-suitcase"></i>
	                </div>

	                <div class="timeline-label">
	                    <h2><a href="#">Parientes dentro de la institución</a></h2>
	                    
					        <div class="row">
					            <div class="col-sm-6 col-md-3">
					                <figure>
	    									<label for="fotografia">Fotografia</label>
		       								<img src="{{asset('imagenes/alumnos/usuarios.png')}}">
					                </figure>
					            </div>
					            <div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>N°.</th>
											<th>ID Matricula</th>
											<th>Parentesco</th>
											<th>Foto</th>
										</thead>
										<?php $cont = 1; ?>
						                @foreach ($parientess as $par)
										<tr>
											<td>{{ $cont }}</td>
											<td>{{ $par->id_matricula }}</td>
											<td>{{ $par->parentesco }} </td>
											<td>
											<img src="{{asset('imagenes/alumnos/'.$par->fotografia)}}" alt="{{ $par->fotografia}}" height="75px" width="75px" class="img-thumbnail">
											</td>
										</tr>
										<?php $cont++; ?>
										@endforeach
									</table>
								</div>
					            
					        </div>
	                </div>
	            </div>

	        </article>

   		 </div>

    
	</div>

</fieldset>




@push('scripts')

@endpush
@endsection

