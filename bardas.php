<?php  
	include_once("clases/funciones.php");
		$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
		if(isset($_GET["campana"])){
			$query = "insert into campanas(nombre) values('".$_GET["campana"]."')";
			$reslast = $oMySQL->ExecuteSQL($query); 
			//echo $query;
		}
?>
		<p>Campanas: <select name='Campanas' id='Campanas' >
        <?php  foreach (getCampanas() as $ObjCampana) : ?>
			<option value="<?php echo $ObjCampana["idcampanas"]; ?>"><?php echo $ObjCampana["nombre"]; ?></option>                        
        <?php 
        endforeach; ?>
        </select> </p> 
		<br>
        <p>Bardas: <select name='Bardas' id='Bardas'>
        <?php  foreach (getBardas() as $ObjEsp) : ?>
            <option value="<?php echo $ObjEsp["idBarda"]; ?>"><?php echo $ObjEsp["nombre_ciudad"]." - ".$ObjEsp["Clave"]; ?></option>                        
        <?php 
        endforeach; ?>
        </select></p>
		<br>
        <input id="tipo" type="hidden" value ="bardas" />
        <input id="guardar" type="submit" value ="Guardar" />