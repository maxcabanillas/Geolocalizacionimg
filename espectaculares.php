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
                    <p>Espectaculares: <select name='Espectacular' id='Espectacular'>
                      <?php  foreach (getEspectaculares() as $ObjEsp) : ?>
                        <option value="<?php echo $ObjEsp["idEspectacular"]; ?>"><?php echo $ObjEsp["Clave"]; ?></option>                        
                      <?php 
                      endforeach; ?>
                    </select></p>
					<br>
					<p>Generica:</p><br>
					<p>Si:<input id="generica" name="generica" type="radio" value ="1"/>   
					No:<input id="generica" name="generica" type="radio" value ="0" checked/></p><br>
					<div class="fechas" id="fechas">
					<p>Fecha de Inicio: <input type="text" name="ini" id="fecha_ini" value=""/></p>
					<p>Fecha de Fin: <input type="text" name="fin" id="fecha_fin" value=""/></p>
					</div>
                    <input id="espectacular" type="hidden" value ="espectacular" />
                    <input id="guardar" type="submit" value ="Guardar" />