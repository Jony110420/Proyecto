<?php
		session_start();
		include_once('php_conexion.php'); 
		
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				if($dato['estado']=='s'){
					$_SESSION['username']=$dato['usu'];
					$_SESSION['tipo_usu']=$dato['tipo'];
					
					///////////////////////////////
					if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){						
						header('location:Administrador.php');
					}
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
	background-image: url(img/UMB.jpg);
  background-size: 100%;

      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #cccc;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 20px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      footer{
  width: 100%;
  margin: 0px auto;
  padding-top: 330px;
  color: #232323;
}

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/i.jpg">
  </head>

  <body>

    <div class="container">
      <form name="form1" method="post" action="" class="form-signin">
        <h2 class="form-signin-heading">Bienvenid@s
<h3>Iniciar Sesion</h3>
        </h2>
        <input type="text" name="usuario" class="input-block-level" placeholder="Usuario" autocomplete="off">
        <input type="password" name="contra" class="input-block-level" placeholder="Contraseña" autocomplete="off">
        <button class="btn btn-large btn-primary" type="submit">Iniciar Sesion</button>
        <p>&nbsp;</p>
<?php
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if(!$dato=mysql_fetch_array($can)){
				if($act=="1"){
					echo '<div class="alert alert-error" align="center"><strong>Usuario y Contraseña Incorrecta</strong></div>';
				}else{
					$act="0";
				}
			}else{
				if($dato['estado']=='n'){
					echo '<div class="alert alert-error" align="center"><strong>Consulte con el Administrador</strong></div>';
				}
			}
		}else{
			
		}
	?>

      </form>
 
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>

<footer>
  Master en JavaScript de Jonathan Alexis &copy;
</footer>
</html>
