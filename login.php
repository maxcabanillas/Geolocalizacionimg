<?php 
  include_once('clases/funciones.php');
  $intConsecutivo=1; 
  //print_r($_POST);

  ?>
<html>
<head>
	<title></title>
</head>
<link   rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/form2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/login.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="js/multi/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="js/multi/demos/assets/style.css" />
<link rel="stylesheet" type="text/css" href="js/multi/demos/assets/prettify.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- gMaps API -->
<script type="text/javascript" src="js/googlemaps.js"></script>
<script type="text/javascript" src='js/funcionales.js'></script>
<script type="text/javascript" src="js/multi/demos/assets/prettify.js"></script>
<script type="text/javascript" src="js/multi/src/jquery.multiselect.js"></script>
<script type="text/javascript" src="js/customselect/jquery.customSelect.js"></script>


<body>
	<div id="cabeza"><img src='img/logo.png' id="logo">
	<img src='img/logo2.png' id="logo2"></div>
	<header>
    <span id="titulo"><h1>Sistema de Geolocalizaci&oacute;n</h1></span>
    </header> 
    <nav>
	<div class="wrapper">  
	<form action="control.php" id="login" method="post">
		<div class="search"> 		
			<div style="padding: 100px 0 0 250px;">


				<div id="login-box">

					<img src="img/user.png" alt="Iniciar Sesi&oacute;n" title="Iniciar Sesi&oacute;n">
					<br />
					<br />
						<div id="login-box-name" style="margin-top:20px;"></div><div id="login-box-field" style="margin-top:20px;"><input name="usuario" id="usuario" class="form-login" title="Username" value="" size="30" maxlength="2048" placeholder="Usuario" /></div>
						<div id="login-box-name"></div><div id="login-box-field"><input name="password" id="pass" type="password" class="form-login"  placeholder="Contrase&ntilde;a" title="Password" value="" size="30" maxlength="2048" /></div>
						<br />
						<br />
						<input type="submit" id="acceder" value="Acceder">
				</div>

				</div>
				<?php
					session_start();
					if (isset($_SESSION['id'])) {
					// Redirect to home page as we are already logged in
					header("location: index.php");
					}
					if (array_key_exists("login", $_GET)) 
					{
					$oauth_provider = $_GET['oauth_provider'];
					if ($oauth_provider == 'google')
					{
					header("Location: login-google.php");
					}
					}
					?>
					<a href="googleapitest.php">Google Login</a>
		</div>   
		</form> 

		<div class="push"></div>
	</div>
		</nav>

    <!-- Jquery -->
<div class="footer">
Guanajuato Gobierno del Estado Paseo de la presa #117, Zona Centro C.P. 36000
</div>
  </body>
</html>