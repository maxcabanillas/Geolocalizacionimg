
	<?php  
	include_once("clases/funciones.php");
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	if(isset($_GET["campana"])){
			$query = "insert into campanas(nombre) values('".$_GET["campana"]."')";
			$reslast = $oMySQL->ExecuteSQL($query); 
			//echo '<span class="label">Se creo correctamente la nueva campaña.</span></br></br>';
			//echo $query;
	}
?>
			<p><span class="label">Campa&ntilde;as: </span><select name='Campanas' id='Campanas'  class="styled">
                      <?php  foreach (getCampanas() as $ObjCampana) : ?>
                        <option value="<?php echo $ObjCampana["idcampanas"]; ?>" ><?php echo $ObjCampana["nombre"];  ?></option>                        
                      <?php 
                      endforeach; ?>
                    </select> </p> 
					