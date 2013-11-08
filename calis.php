
<?php 
  include_once('clases/funciones.php');
  $intConsecutivo=1; 
  ?>
<html lang="es">
<head>
	<title></title>
</head>
<!-- Fancy box -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script src="js/multiselect/jquery.multiselect.js"></script>
<script src="js/multiselect/jquery.multiselect.min.js"></script>
<script src="js/multiselect/prettify.js"></script>
<link rel="stylesheet" href="js/multiselect/jquery.multiselect.css"></style>
<link rel="stylesheet" href="js/multiselect/style.css"></style>
<link rel="stylesheet" href="js/multiselect/prettify.css"></style>
<script type="text/javascript" src='js/funcionales.js'></script>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- gMaps API -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDEflFIUvUK0mFTnLBReB1vOV_NGKNJfeo&sensor=true"></script>

<body>
	<header>
    <h1>Localizacion</h1>
    </header> 
    <nav>
	<div class="search">    
					<?php $i=0; foreach (getMunicipios() as $ObjCiudad) : $i++; endforeach; ?>	
                    <select name='Municipios[]' id='Municipios' size='<?php echo $i;?>' multiple='true'>
                      <?php  foreach (getMunicipios() as $ObjCiudad) : ?>
                        <option value="<?php echo $ObjCiudad["idciudad"]; ?>" lat="<?php echo $ObjCiudad["Latitud"]; ?>" long="<?php echo $ObjCiudad["Longitud"]; ?>"><?php echo $ObjCiudad["nombre_ciudad"]; ?></option>                        
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