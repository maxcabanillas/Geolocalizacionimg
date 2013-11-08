
<?php 
  include_once('clases/funciones.php');
  $intConsecutivo=1; 
 // print_r($_POST);
 if(isset($_POST["Campanas"]) && isset($_POST["espectacular"])){
		AgregarCampana($_POST["Campanas"],$_POST["Espectacular"],$_POST["generica"],$_POST["ini"],$_POST["fin"]);
		header("Location:index.php?e=o");
  }elseif(isset($_POST["Campanas"]) && isset($_POST["tipo"])){
		$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
		$reslast = $oMySQL->ExecuteSQL("update bardas set idacampana = ".$_POST["Campanas"]." where idbardas=".$_POST["Bardas"]); 
  }
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
<script type="text/javascript">
$(function(){
	$("#Municipios").multiselect();
	$("#campanas").multiselect();
});
</script>

<body>
	<header>
    <h1>Localizacion</h1>
    </header> 
    <nav>
	<div class="search">    
					<?php $i=0; foreach (getMunicipios() as $ObjCiudad) : $i++; endforeach; ?>	
                    <select name='Municipios' id='Municipios' size='<?php echo $i;?>' multiple='true'>
                      <?php  foreach (getMunicipios() as $ObjCiudad) : ?>
                        <option value="<?php echo $ObjCiudad["idciudad"]; ?>" lat="<?php echo $ObjCiudad["Latitud"]; ?>" long="<?php echo $ObjCiudad["Longitud"]; ?>"><?php echo $ObjCiudad["nombre_ciudad"]; ?></option>                        
                      <?php 
                        $intConsecutivo++;
                      endforeach; ?>
                    </select>            
                    <?php $i=0; foreach (getCampanas() as $ObjCampana) : $i++; endforeach; ?>	
                    <select name='campanas' id='campanas' size='<?php echo $i;?>' multiple='true'>
                      <?php  foreach (getCampanas() as $ObjCampana) : ?>
                        <option value="<?php echo $ObjCampana["idcampanas"]; ?>"><?php echo $ObjCampana["nombre"]; ?></option>                        
                      <?php 
                        $intConsecutivo++;
                      endforeach; ?>
                    </select>
                    <select id="tipo">
                       <option value="1">Espectaculares</option>              
                       <option value="2">Muros</option>              
                    </select>   
                     <!--select id="alerta">
                      <option value="0">Todos</option>         
                       <option value="1">Verde</option>              
                       <option value="2">Ambar</option>              
                      <option value="3">Rojo</option>   
                       <option value="4">Negro</option>   
                    </select-->
                    <!--select id="proveedores">
                       <option value="0">Todos</option-->  
                      <?php  /* foreach (getProveedores() as $ObjProveedor) : */ ?>
                        <!--option value="<?php //echo $ObjProveedor["idtbl_proveedores"]; ?>"><?php //echo $ObjProveedor["nombre"]; ?></option-->                        
                      <?php 
                       /*  $intConsecutivo++;
                      endforeach; */ ?>
                    <input id="search" type="button" value ="Search" />
                    <div class="clear"></div>
                </div>   
    </nav>

    <div id="marcas" style="width: 40%; height: 80%; float: left;"></div>     
    
    <div id="map" style="width: 60%; height: 80%; float:right;"></div>

    <!-- Jquery -->


  </body>
</html>