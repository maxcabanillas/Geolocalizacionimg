<?php 
  include_once('seguridad.php');
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
<link rel="stylesheet" href="css/estilomenu.css" type="text/css" media="screen" />
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
<div id="wrapper">
<div id="search">
<ul class="ac-menu">
			<li id="one">
				<a href="#">Panel de Control</a>
				<ul class="sub-menu">
					<li><a href="PanelControl.php">Panel de Control de Espectaculares</a></li>
					<li><a href="PanelControlBardas.php">Panel de Control de Bardas</a></li>
				</ul>
			</li>
			<li id="two">
				<a href="#">Edici&oacute;n</a>
				<ul class="sub-menu">					
					<li><a href="Editar.php">Edici&oacute;n de Espectaculares</a></li>					
					<li><a href="EditarBardas.php">Edici&oacute;n de Bardas</a></li>
				</ul>
			</li>
		</ul>
	</div>	
	</div>
    </div>

		</nav>

    <!-- Jquery -->
<div class="footer">
Guanajuato Gobierno del Estado Paseo de la presa #117, Zona Centro C.P. 36000
</div>
  </body>
</html>