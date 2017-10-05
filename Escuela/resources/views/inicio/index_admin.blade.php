@extends ('layouts.admin')
@section('contenidoAdmin')
<div id="page-wrapper">

			<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $usuarioactual->tipo($usuarioactual->tipoUsuario); ?></h1>
                </div>
                <!--End Page Header -->
            </div>	

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-joomla "></i><b>&nbsp;¡HOLA! BIENVENIDO </b><b> {{$usuarioactual->name}} </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa fa-home fa-3x"></i>&nbsp;<b>  Acceso Rápido</a></b> 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa  fa-file-pdf-o fa-3x"></i>&nbsp;<b> Genera Reportes</a></b>   
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa fa-share-square-o fa-3x"></i>&nbsp;<b> Comparte un Anuncio</a> </b> 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa  fa-comments fa-3x"></i>&nbsp;<b>  Revisa tus Mensajes</a></b>
                    </div>
                </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Población del año presente
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Acciones
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                        	<div class="table-responsive">
                            <div id="bar-example"></div>
                            </div>
                        </div>

                    </div>
                    <!--End area chart example -->

	                    <!-- Notifications-->
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <i class="fa fa-bell fa-fw"></i>Notificaciones
	                        </div>

	                        <div class="panel-body">
	                            <div class="list-group">
	                                <a href="#" class="list-group-item">
	                                    <i class="fa fa-comment fa-fw"></i>Nuevo Comentario
	                                    <span class="pull-right text-muted small"><em>Hace 4 min</em>
	                                    </span>
	                                </a>
	                                <a href="#" class="list-group-item">
	                                    <i class="fa fa-file-word-o fa-fw"></i>3 Nuevos Archivos
	                                    <span class="pull-right text-muted small"><em>Hace 12 min</em>
	                                    </span>
	                                </a>
	                                <a href="#" class="list-group-item">
	                                    <i class="fa fa-envelope fa-fw"></i>Mensaje Enviado
	                                    <span class="pull-right text-muted small"><em>Hace 27 min</em>
	                                    </span>
	                                </a>
	                                <a href="#" class="list-group-item">
	                                    <i class="fa fa-tasks fa-fw"></i>Nuevo Evento
	                                    <span class="pull-right text-muted small"><em>Hace 43 min</em>
	                                    </span>
	                                </a>
	                            </div>
	                            <!-- /.list-group -->
	                            <a href="#" class="btn btn-default btn-block">Ver todas las notificaciones</a>
	                        </div>

	                    </div>
	                    <!--End Notifications-->
                </div>

                <div  class="col-lg-4">
                    <div  class="panel panel-primary text-center no-boder">
                        <div  class="panel-body yellow">
                            <i class="fa fa fa-floppy-o fa-3x"></i>
                            <h3>20 MB </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Nuevos Datos Cargados
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-pencil-square-o fa-3x"></i>
                            <h3>16</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Encontramos Notas Pendientes
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa fa-user fa-3x"></i>
                            <h3>10</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Se Reportan Inasistencias
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa-calendar fa-3x"></i>
                            <h3>2 </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title"> Nuevos Eventos
                            </span>
                        </div>
                    </div>
                </div>
            </div>
</div>

	
@endsection