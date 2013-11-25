<?php 
	include ("seguridad.php");
	include_once('clases/funciones.php');
	$intConsecutivo=1; 
?>
<html lang="es">
<head>
	<title></title>
</head>

<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="js/multi/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="js/multi/demos/assets/style.css" />
<link rel="stylesheet" type="text/css" href="js/multi/demos/assets/prettify.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />

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
	$('.styled').customSelect();
	$("#Municipios").multiselect();
	$("#campanas").multiselect();
	$( "#fecha_ini" ).datepicker();
	$( "#fecha_fin" ).datepicker();
	//$( ".fechas" ).hide();
});

</script>
<script>
 $(":radio:eq(0)").click(function(){
             $(".fechas").show(1000);
          });

          $(":radio:eq(1)").click(function(){
             $(".fechas").hide(1000);
          });
</script>
<body>
	<div id="cabeza"><img src='img/logo.png' id="logo">
	<img src='img/logo2.png' id="logo2"></div>
	<header>
    <h1>Panel de control bardas</h1>
    </header> 
    <form action="index.php" id="nuevo" method="post">
	<div class="wrapper" id="wrapper"> 
				<span id="User">Bienvenido <?php echo $_SESSION["user"]; ?>.</span>
				<span id="sesion"><a href="index.php?sesion=cerrar">Cerrar Sesi&oacute;n.</a></span> 
	<div class="search" id="search">  
	<p><span class="label">Nombre Campa&ntilde;a:</span><input id="campana" name="campana" type="text" value ="" class="text"/>  
                  <a onclick="AgregarCampana();">  <input id="savecampana" type="button" value ="Guardar" /> </a>
					</p><br>  	
                     <?php include("bardas.php"); ?>
		 <p><span class="label">Bardas: </span><select name='Bardas' id='Bardas' class="styled">
        <?php  foreach (getBardas() as $ObjEsp) : ?>
            <option value="<?php echo $ObjEsp["idBarda"]; ?>"><?php echo $ObjEsp["nombre_ciudad"]." - ".$ObjEsp["Clave"]; ?></option>                        
        <?php 
        endforeach; ?>
        </select></p>
		<br>
        <input id="tipo" type="hidden" value ="bardas" />
        <input id="guardar" type="submit" value ="Guardar" />
                    <div class="clear"></div>
        </div>
			 </div>
    </form>

    <div id="footer" class="footer">
	Guanajuato Gobierno del Estado Paseo de la presa #117, Zona Centro C.P. 36000
	</div>     
    
    <!-- Jquery -->


  </body>
</html>