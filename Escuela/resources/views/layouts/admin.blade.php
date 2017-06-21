<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Centro Escolar Jardines de la Sabana</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>JS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administración</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="fa fa-user">&nbsp;&nbsp;<?= $usuarioactual->name ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                     <span class="fa fa-user">&nbsp;&nbsp;<?= $usuarioactual->tipo($usuarioactual->tipoUsuario);   ?></span>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{ route('logout')}}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>



      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">           
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
          
         <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Matriculas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('MatriculaController@index')}}"><i class="fa fa-circle-o"></i> Nuevo Ingreso</a></li>
                <li><a href="{{URL::action('Matricula2Controller@index')}}"><i class="fa fa-circle-o"></i> Antiguo Ingreso</a></li>
              </ul>
            </li>
            
            @if($usuarioactual->tipo($usuarioactual->tipoUsuario)==1)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open-o"></i>
                <span>Docentes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Consultar Docentes</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Coordinación </a></li>
              </ul>
            </li>
            @endif

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i>
                <span>Calificaciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Agregar Notas</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Consultar Notas</a></li>
              </ul>
            </li>
            
            @if($usuarioactual->tipoUsuario==1) 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>Gestion de Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{ route('form_nuevo_usuario') }}"><i class="fa fa-circle-o"></i> Agregar usuario</a></li>
              <li><a href="{{ route('listado_usuarios/{page?}')}}"><i class="fa fa-circle-o"></i>Listado Usuarios</a></li>
              </ul>
            </li>
            @endif

            @if($usuarioactual->tipoUsuario==1)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span>Ajustes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('TurnoController@index')}}"><i class="fa fa-circle-o"></i> Gestión de Turnos</a></li>
                <li><a href="{{URL::action('GradoController@index')}}"><i class="fa fa-circle-o"></i> Gestión de Grados</a></li>
                <li><a href="{{URL::action('SeccionController@index')}}"><i class="fa fa-circle-o"></i> Gestión de Secciones</a></li>
                <li><a href="{{URL::action('TipoResponsableController@index')}}"><i class="fa fa-circle-o"></i> Catálogo de responsables</a></li>
              </ul>
            </li>
            @endif
            <li>
              <a href="#">
                <i class="fa fa-file-pdf-o"></i> <span>Reportes</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('EstudianteController@index')}}"><i class="fa fa-circle-o"></i> Consulta de Estudiantes</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">CEJAS</small>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-facebook"></i> FACEBOOK</a></li>
                <li><a href="#"><i class="fa fa-twitter"></i> TWITTER</a></li>
                <li><a href="#"><i class="fa fa-instagram"></i> INSTAGRAM</a></li>
              </ul>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Centro Escolar Jardines de la Sabana</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
    
      </footer>

    <script src="{{asset('js/sistemalaravel.js')}}"></script>
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    <script src="{{asset('js/sistemalaravel.js')}}"></script>
    
  </body>
</html>
