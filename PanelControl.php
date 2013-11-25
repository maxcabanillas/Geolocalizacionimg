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
    <h1>Panel de control espectaculares</h1>
    </header> 
	<nav> 
	<div class="wrapper" id="wrapper"> 
				<span id="User">Bienvenido <?php echo $_SESSION["user"]; ?>.</span>
				<span id="sesion"><a href="index.php?sesion=cerrar">Cerrar Sesi&oacute;n.</a></span>
    <form action="index.php" id="nuevo" method="post">
	<div class="cmp" id="cmp"> <p><span class="label">Nombre Campa&ntilde;a:</span><input id="campana" name="campana" type="text" value ="" class="text"/>  
                  <a onclick="AgregarCampanaEsp();">  <input id="savecampana" type="button" value ="Guardar" /> </a>
					</p><br></div> 
	<div class="search" id="search">  
                     <div id="act">  <?php include("espectaculares.php"); ?> </div> 
					 <br>
                    <p><span class="label">Espectaculares: </span><select name='Espectacular' id='Espectacular' class="styled">
                      <?php  foreach (getEspectaculares() as $ObjEsp) : ?>
                        <option value="<?php echo $ObjEsp["idEspectacular"]; ?>"><?php echo $ObjEsp["Clave"]; ?></option>                        
                      <?php 
                      endforeach; ?>
                    </select></p>
					<br>
					<p><span class="label">Gen&eacute;rica:</span></p><br>
					<p><span class="label">Si:<input id="generica" name="generica" type="radio" value ="1"/>   </span>
					<span class="label">No:<input id="generica" name="generica" type="radio" value ="0" checked/></p></span><br>
					<div class="fechas" id="fechas">
					<p><span class="label">Fecha de Inicio: </span><input type="text" name="ini" id="fecha_ini" value=""/></p>
					<p><span class="label">Fecha de Fin: </span><input type="text" name="fin" id="fecha_fin" value=""/></p>
					</div><br>
                    <input id="espectacular" type="hidden" value ="espectacular" />
                    <input id="guardar" type="submit" value ="Guardar" />
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