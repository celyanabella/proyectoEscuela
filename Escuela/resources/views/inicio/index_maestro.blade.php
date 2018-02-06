@extends ('layouts.maestro')
	@section('contentMaestro')
	
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
                        <i class="fa fa-joomla"></i><b>¡HOLA! BIENVENIDO </b><b> {{$usuarioactual->name}} </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa fa-calendar fa-3x"></i>&nbsp;<b>  Agenda tus Exámenes</a></b> 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa  fa-book fa-3x"></i>&nbsp;<b>  Administra tu Libreria</a></b>   
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa fa-newspaper-o fa-3x"></i>&nbsp;<b> Nuevos Anuncios</a> </b> 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <a style="text-decoration: none;" href="#"><i class="fa  fa-comments fa-3x"></i>&nbsp;<b> Revisa tus Mensajes</a></b>
                    </div>
                </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Notas más altas por curso
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Acciones
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Acción</a>
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
                            <div id="graph"></div>
                            </div>
                        </div>

                    </div>
                    <!--End area chart example -->
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
                </div>

            </div>


        </div>
@endsection