
<?php 
  include_once('clases/funciones.php');
  $intConsecutivo=1; 
  ?>
<html lang="es">
<head>
	<title></title>
</head>

<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
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
<script type="text/javascript">
$(function(){
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
	<header>
    <h1>Panel de control</h1>
    </header> 
    <form action="index.php" id="nuevo" method="post">
	<p>Nombre Campaña:<input id="campana" name="campana" type="text" value =""/>  
                  <a onclick="AgregarCampanaEsp();">  <input id="savecampana" type="button" value ="Guardar" /> </a>
					</p><br>
	<div class="search" id="search">    	
                     <?php include("espectaculares.php"); ?>
                    <div class="clear"></div>
                </div>   
    </form>

    <div id="marcas" style="width: 40%; height: 80%; float: left;"></div>     
    
    <div id="map" style="width: 60%; height: 80%; float:right;"></div>

    <!-- Jquery -->


  </body>
</html>