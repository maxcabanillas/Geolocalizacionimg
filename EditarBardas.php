<?php 
	include ("seguridad.php");
	include_once('clases/funciones.php');
	$intConsecutivo=1; 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="es">
<head>
	<title></title>
</head>
<link   rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" />
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
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/customselect/jquery.customSelect.js"></script>
<script type="text/javascript">
$(function(){
	$('.styledesp').customSelect();
});

</script>
<body>
	<div id="cabeza"><img src='img/logo.png' id="logo">
	<img src='img/logo2.png' id="logo2"></div>
	<header>
    <h1>Edici&oacute;n espectaculares</h1>
    </header> 
	<nav> 
	<div class="wrapper" id="wrapper"> 
				<span id="User">Bienvenido <?php echo $_SESSION["user"]; ?>.</span>
				<span id="sesion"><a href="index.php?sesion=cerrar">Cerrar Sesi&oacute;n.</a></span>
    <form action="index.php" id="nuevo" method="post">
	
	<div class="search" id="search">   
					<input type="hidden" value ="act" name="act" id="act"/>
                     <span class="espectaculares"><span class="label">Bardas: </span><select name='Espectacular' id='Espectacular' onchange="ActCampanas(this.value,0);" class="styledesp">
					 <option value="0"></option>
                      <?php  foreach (getBardas() as $ObjB) : ?>
                        <option value="<?php echo $ObjB["idBarda"]; ?>"><?php echo $ObjB["Clave"]; ?></option>                        
                      <?php 
                        $intConsecutivo++;
                      endforeach; ?>
                    </select></span></p>
					
                    <span class="espectacularesdiv" id="espectacularesdiv">                    
                      </span></p> 
					<br>
					<br>
					<span class="edit" id="edit"></span>
                    <div class="clear"></div>
					
                </div>   

    </form>
	</div>
	</nav> 
<div class="footer">
Guanajuato Gobierno del Estado Paseo de la presa #117, Zona Centro C.P. 36000
</div>

    <!-- Jquery -->


  </body>
</html>