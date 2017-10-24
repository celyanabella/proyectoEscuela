
<!DOCTYPE html>
<html>
<head>
<title>Ingreso al Sistema</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Magnificent login form a Flat Responsive Widget,Login form widgets, Sign up Web  forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link href="css/estiloLogin.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-css-->
<link rel="stylesheet" href="css/font-awesomeLogin.css"><!--fontawesome-->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"><!--online fonts-->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"><!--online fonts-->
</head>
<body>
  <div class="w3ls-main">
    <div class="wthree-heading">
      <h1>Sistema de Matriculas</h1>
    </div>
      <div class="wthree-container">
        <div class="wthree-form">
          <div class="agileits-2">
            <h2>login</h2>
          </div>
          <form action="login" method="post">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
            <div class="">
              <span><i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" name="name" placeholder="Usuario" required="">
            </div>

            <div class="clear"></div>
            <div class="w3-psw">
              <span><i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" name="password" placeholder="Contraseña" required="">
            </div>
            <div class="clear"></div>
            
            <div class="clear"></div>
            <div class="w3l-submit">
              <input type="submit" value="Entrar">
            </div>
            <div class="clear"></div>
          </form>
        </div>
      </div>
  </div>
    <div class="agileits-footer">
      <p>&copy; Centro Escolar Jardines de La Sabana | Todos los derechos reservados </p>
    </div>
</body>
</html>