<?php  
	include_once("clases/funciones.php");
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	$servidor=SERVIDOR; 
	$basededatos=BASE;	
	$dbpass=CLAVE; 
	$dbuser=USUARIO;
	$vigencia =0;
	$lista ="";
	$conexion=mysql_connect($servidor,$dbuser,$dbpass) ;	
	mysql_select_db($basededatos,$conexion);
	if(isset($_GET["eliminar"])){
		if($_GET["eliminar"]==1){
			$querydel = "update campanas c join bardas b on
							b.idcampanas = c.idcampanas 
						set b.activo = 0 where b.idcampanas = ".$_GET["camp"]." 
						 and b.idbardas = ".$_GET["idb"];
			$res =  $oMySQL->ExecuteSQL($querydel); 
		}
	}
	$query="SELECT c.idcampanas, c.nombre from bardas b join campanas c on c.idcampanas = b.idcampanas
			where b.idbarda = ".$_GET["b"]." b.activo=1";
			$result = mysql_query($query); 
			echo "<p><span class='label'>Campa&ntilde;as Actuales: </span><select name='Campanas' id='Campanas'  class='styled' onchange='ActCampanas(".$_GET["b"].",this.value)';>";
			echo   "<option value='0' ></option> ";
			while ($row = mysql_fetch_array($result)){ 
				if($_GET["camp"] == $row["idcampanas"]){
					echo   "<option value='".$row["idcampanas"]."' selected>".$row["nombre"]."</option> ";    
				}else{
					echo   "<option value='".$row["idcampanas"]."'>".$row["nombre"]."</option> ";
				}
				$lista .= '<ul class="subnavegador"><li><span class="labellist">'.$row["nombre"].'     </span><a onclick="EliminarCampB('.$row["idcampanas"].','.$_GET["b"].');"><img src="img/delete.png" alt="Borrar" title="Borrar" class="borrar"></a></li></ul> '; 
			}
			echo "</select> </p><div id='lista'>"; 
			echo "<ul id='menu'><li class='dblegable'><h3>Eliminar Campa&ntilde;a.</h3></li>";
				echo $lista;
			echo "</ul></div>";  
			$lista = ""; 
?>