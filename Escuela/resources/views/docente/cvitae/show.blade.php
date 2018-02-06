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
                        <h2><a href="#">Datos Personales</a></h2>
                         <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <figure>
                                            @if(($maestro->fotografia)!="")
                                                <img src="{{asset('imagenes/maestros/fotos/'.$maestro->fotografia)}}">
                                            @elseif($maestro->sexo=="F")
                                                    <img src="{{asset('imagenes/maestros/fotos/e1.png')}}">
                                                @else
                                                 <img src="{{asset('imagenes/maestros/fotos/e2.png')}}">
                                            @endif
                                    </figure>
                                </div>
                                <div class="col-sm-6 col-md-9">
                                    <aside class="col-md-3">
                                        <b>Nombre</b><h5>{{$maestro->nombre}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Apellido</b><h5>{{$maestro->apellido}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                    <b>Fecha Nac.</b><h5>{{$maestro->fechanacimiento}}</h5>
                                    </aside>  
                                </div>
                                <div class="col-sm-6 col-md-9">
                                    <aside class="col-md-3">
                                        <b>Estado Civil</b><h5>{{$estado->tipo}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Sexo</b><h5>{{$maestro->sexo}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Teléfono</b><h5>{{$maestro->telefono}}</h5>
                                    </aside>    
                                </div>
                                <div class="col-sm-6 col-md-9">
                                    <aside class="col-md-3">
                                        <b>Depto. de Nac.</b><h5>{{ $depto->nombre }}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Municipio de Nac.</b><h5>{{ $mun->nombre }}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Nac. extranjero</b><h5>{{ $hoja->nacimientoextranjero }}</h5>
                                    </aside>
                                </div>
                                <div class="col-sm-6 col-md-9">
                                    <aside class="col-md-9">
                                        <b>Dirección Actual</b><h5>{{$maestro->direccion}}</h5>
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
                        <h2><a href="#">Datos CV</a></h2>
                        
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <aside class="col-md-3">
                                        <b>Nivel</b><h5>{{$nivel->nivel}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Categoria</b><h5>{{$categoria->categoria}}</h5>
                                    </aside> 
                                    <aside class="col-md-3">
                                        <b>Clase</b><h5>{{$clase->clase}}</h5>
                                    </aside> 
                                    <aside class="col-md-3">
                                        <b>Extendido</b><h5>{{$maestro->extendido}}</h5>
                                    </aside>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <aside class="col-md-3">
                                        <b>DUI</b><h5>{{$maestro->mdui}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>NIT</b><h5>{{$maestro->nit}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>AFP</b><h5>{{$maestro->afp}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>NIP</b><h5>{{$maestro->nip}}</h5>
                                    </aside>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <aside class="col-md-3">
                                        <b>INPEP</b><h5>{{$maestro->inpep}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>C.E donde fue nombrado</b><h5>{{$hoja->cenombrado}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Código</b><h5>{{$hoja->codigoinstitucion}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Ingreso al sector público</b><h5>{{$hoja->fechaingresopublico}}</h5>
                                    </aside>  
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <aside class="col-md-3">
                                        <b>Ingreso al C.E donde labora</b><h5>{{$hoja->fechalaboral}}</h5>
                                    </aside>  
                                    <aside class="col-md-3">
                                        <b>Último Ascenso</b><h5>{{$hoja->ultimoascenso}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Próximo ascenso</b><h5>{{$hoja->proximoascenso}}</h5>
                                    </aside>
                                    <aside class="col-md-3">
                                        <b>Años de servicio</b><h5>{{$hoja->aniosservicio}}</h5>
                                    </aside>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <aside class="col-md-3">
                                        <b>Cargo</b><h5>{{$hoja->cargo}}</h5>
                                    </aside>
                                    <aside class="col-md-6">
                                        <b>Funciones</b><h5>{{$hoja->funciones}}</h5>
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
                        <h2><a href="#">Estudios Realizados</a></h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>Institucion</th>
                                            <th>Clase de Estudio</th>
                                            <th>Especialidad</th>
                                            <th>Copia</th>
                                        </thead>
                                       @foreach ($estudios as $ma)
                                        <tr>
                                            <td>{{ $ma->institucion}}</td>
                                            <td>{{ $ma->tipo }}</td>
                                            <td>{{ $ma->especialidad }}</td>
                                            <td>
                                                <img src="{{asset('imagenes/maestros/estudios/'.$ma->copia)}}" alt="{{ $ma->copia}}" height="100px" width="100px" class="img-thumbnail">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="timeline-entry">

                <div class="timeline-entry-inner">

                    <div class="timeline-icon bg-warning">
                        <i class="entypo-camera"></i>
                    </div>

                    <div class="timeline-label">
                        <h2><a href="#">Capacitaciones Recibidas</a></h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>Año</th>
                                            <th>Nombre de la Capacitacion</th>
                                            <th>Horas</th>
                                            <th>Copia</th>
                                        </thead>
                                       @foreach ($capacitaciones as $ca)
                                        <tr>
                                            <td>{{ $ca->anio}}</td>
                                            <td>{{ $ca->nombre }}</td>
                                            <td>{{ $ca->horas }}</td>
                                            <td>
                                                <img src="{{asset('imagenes/maestros/capacitaciones/'.$ca->copia)}}" alt="{{ $ca->copia}}" height="100px" width="100px" class="img-thumbnail">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
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
                        <h2><a href="#">Record Laboral</a></h2>
                       <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>Cargo</th>
                                            <th>Lugar de Trabajo</th>
                                            <th>Tiempo</th>
                                            <th>Copia</th>
                                        </thead>
                                       @foreach ($trabajos as $tb)
                                        <tr>
                                            <td>{{ $tb->cargo}}</td>
                                            <td>{{ $tb->lugar }}</td>
                                            <td>{{ $tb->tiempo }}</td>
                                            <td>
                                                <img src="{{asset('imagenes/maestros/trabajos/'.$tb->copia)}}" alt="{{ $tb->copia}}" height="100px" width="100px" class="img-thumbnail">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</fieldset>


@endsection

