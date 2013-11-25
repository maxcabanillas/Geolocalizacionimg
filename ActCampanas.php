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
			$querydel = "update campanas c join vigencia v on
							v.idcampana = c.idcampanas join espectaculares_vigencia espv on
							espv.idvigencia = v.idvigencia
						set v.activo = 0, espv.activoespv = 0 where v.idcampana = ".$_GET["camp"]." 
						and espv.idvigencia = ".$_GET["idv"]." and espv.idespectaculares = ".$_GET["esp"];
			$res =  $oMySQL->ExecuteSQL($querydel); 
		}
	}
	$query="SELECT c.idcampanas, c.nombre, esv.idvigencia, esv.idespectaculares FROM espectaculares es join espectaculares_vigencia esv on
				esv.idespectaculares = es.idespectacular join vigencia v on
				v.idvigencia = esv.idvigencia join campanas c on
				c.idcampanas = v.idcampana
			where es.idespectacular = ".$_GET["esp"]." and v.activo = 1 and esv.activoespv=1";
			$result = mysql_query($query); 
			echo "<p><span class='label'>Campa&ntilde;as Actuales: </span><select name='Campanas' id='Campanas'  class='styled' onchange='ActCampanas(".$_GET["esp"].",this.value)';>";
			echo   "<option value='0' ></option> ";
			while ($row = mysql_fetch_array($result)){ 
				if($_GET["camp"] == $row["idcampanas"]){
					echo   "<option value='".$row["idcampanas"]."' selected>".$row["nombre"]."</option> ";    
				}else{
					echo   "<option value='".$row["idcampanas"]."'>".$row["nombre"]."</option> ";
				}
				$lista .= '<ul class="subnavegador"><li><span class="labellist">'.$row["nombre"].'     </span><a onclick="EliminarCamp('.$row["idcampanas"].','.$row["idvigencia"].','.$row["idespectaculares"].');"><img src="img/delete.png" alt="Borrar" title="Borrar" class="borrar"></a></li></ul> '; 
			}
			echo "</select> </p><div id='lista'>"; 
			echo "<ul id='menu'><li class='desplegable'><h3>Eliminar Campa&ntilde;a.</h3></li>";
				echo $lista;
			echo "</ul></div>";  
			$lista = ""; 
	if($_GET["camp"] != 0){		
		$query="SELECT v.idvigencia,fecha_fin,fecha_ini FROM espectaculares es join espectaculares_vigencia esv on
				esv.idespectaculares = es.idespectacular join vigencia v on
				v.idvigencia = esv.idvigencia join campanas c on
				c.idcampanas = v.idcampana
			where es.idespectacular = ".$_GET["esp"]." and c.idcampanas = ".$_GET["camp"];
		$result = mysql_query($query); 
		echo '<p><span class="label">Generica:</span></p><br>
					<p><span class="label">Si:<input id="generica" name="generica" type="radio" value ="1"/>  </span>  
					<span class="label">No:<input id="generica" name="generica" type="radio" value ="0" checked/></p></span><br>';
		while ($row = mysql_fetch_array($result)){ 
			$fin = explode('-',$row["fecha_fin"]);
			$ini = explode('-',$row["fecha_ini"]);
			$vigencia = $row["idvigencia"];
		}
			echo 	'<div class="fechas" id="fechas">
					<p><span class="label">Fecha de Inicio: </span><input type="text" name="ini" id="fecha_ini" value="'.$ini[2].'/'.$ini[1].'/'.$ini[0].'"/></p>
					<p><span class="label">Fecha de Fin: </span><input type="text" name="fin" id="fecha_fin" value="'.$fin[2].'/'.$fin[1].'/'.$fin[0].'"/></p>
					</div>';
		echo	'<input type="hidden" name="vigencia" id="vigencia" value="'.$vigencia.'"/>';
		echo	'<input id="guardar" type="submit" value ="Guardar" />';
	}
?>