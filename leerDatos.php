<?php
	include_once('clases/MySQL.php');
	include_once('GLOBALS.php');
	include_once('clases/funciones.php');
	$where_prov="";
	$where_alerta="";
	$idMunicipio=$_GET["municipio"];
	$idTipo = $_GET["tipo"];
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);


	if($idTipo==1){		
		$where = "";
		$servidor=SERVIDOR; 
		$basededatos=BASE;	
		$dbpass=CLAVE; 
		$dbuser=USUARIO;	
		$conexion=mysql_connect($servidor,$dbuser,$dbpass) ;	
		mysql_select_db($basededatos,$conexion); 
		$query="select es.idEspectacular, es.idciudad, es.Clave, Latitud, Longitud, Direccion, Icono, w, h, Foto, es.Activo,
					esv.idespectaculares_vigencia, esv.idespectaculares, v.idvigencia, v.fecha_ini, v.fecha_fin,
					v.idcampana, v.activo, c.idcampanas, c.nombre, c.observaciones, DATEDIFF(fecha_fin,CURDATE()) as datedif
			from espectaculares es left join espectaculares_vigencia esv on
				es.idespectacular = esv.idespectaculares left join 
				vigencia v on v.idvigencia = esv.idvigencia
			left join campanas c on c.idcampanas = v.idcampana
					where es.activo=1 ";
			$vigencia = "0";
			$espectacular = "0";
		if($_GET['campanas']!="0"){
			$Campanas = $_GET['campanas'];
			$Camres = "";
			$arrayCampana = explode(',',$Campanas);
			$conteo = count($arrayCampana);
			for($a=0;$a<$conteo;$a++){
				$queryCamp = "SELECT v.idvigencia, esv.idespectaculares FROM campanas c join vigencia v on v.idcampana = c.idcampanas join
								espectaculares_vigencia esv on esv.idvigencia = v.idvigencia
								where c.idcampanas in (".$arrayCampana[$a].") and v.fecha_ini <= CURDATE() and v.fecha_fin >= CURDATE()";
				$result = mysql_query($queryCamp); 
				$conteos = 0;
				while ($row = mysql_fetch_array($result)){ 
					$vigencia .= ",".$row["idvigencia"];
					$espectacular .= ",".$row["idespectaculares"];
					$conteos++;
				}
				if($conteos==0){
					$queryCamp2 = "SELECT v.idvigencia FROM campanas c join vigencia v on v.idcampana = c.idcampanas join
									espectaculares_vigencia esv on esv.idvigencia = v.idvigencia
									where c.idcampanas in (".$arrayCampana[$a].") and v.fecha_ini <= 0000-00-00 and v.fecha_fin >= 0000-00-00
									and esv.idespectaculares not in (".$espectacular.")";
					$result2 = mysql_query($queryCamp2); 
					while ($row2 = mysql_fetch_array($result2)){ 
						$vigencia .= ",".$row2["idvigencia"];
					}
				}
				
			}
			$where .= " and esv.idvigencia in (".$vigencia.")";
		}else{
			//traer de una consiulta todas las campanas y meterlas al array
			$campnas = "SELECT * from campanas";
			$Campanas="0";
			$conteos=0;
				$resultcp = mysql_query($campnas); 
				$conte = 0;
				while ($row = mysql_fetch_array($resultcp)){ 
					$Campanas .= ",".$row["idcampanas"];
					$conteos++;
			}
			$Camres = "";
			$arrayCampana = explode(',',$Campanas);
			$conteo = count($arrayCampana);
			for($a=0;$a<$conteo;$a++){
				$queryCamp = "SELECT v.idvigencia, esv.idespectaculares FROM campanas c join vigencia v on v.idcampana = c.idcampanas join
								espectaculares_vigencia esv on esv.idvigencia = v.idvigencia
								where  c.idcampanas in (".$arrayCampana[$a].") and v.fecha_ini <= CURDATE() and v.fecha_fin >= CURDATE() 
								order by fecha_ini desc limit 1";
				$result = mysql_query($queryCamp); 
				$conteos = 0;
				while ($row = mysql_fetch_array($result)){ 
					$vigencia .= ",".$row["idvigencia"];
					$espectacular .= ",".$row["idespectaculares"];
					$conteos++;
				}
			}	
					$queryCamp2 = "SELECT v.idvigencia, esv.idespectaculares FROM campanas c join vigencia v on v.idcampana = c.idcampanas join
								espectaculares_vigencia esv on esv.idvigencia = v.idvigencia
								where  c.idcampanas in (".$Campanas.") and v.fecha_ini <= 0000-00-00 and v.fecha_fin >= 0000-00-00
								and esv.idespectaculares not in (".$espectacular.")";
					$result2 = mysql_query($queryCamp2); 
					while ($row2 = mysql_fetch_array($result2)){ 
						$vigencia .= ",".$row2["idvigencia"];
					}
			$where .= " and esv.idvigencia in (".$vigencia.")";
		}
		if(isset($_GET['municipio'])){
			$Municipio = $_GET['municipio'];
			if($Municipio != "0"){
				$where .= " and idciudad in (" .$Municipio.")";
			}
		}
		$query .= $where." order by clave asc";
	}
	elseif($idTipo==2){
		$query="SELECT * FROM bardas b join ciudades cd on cd.idciudad=b.idciudades where b.idciudades in (". $idMunicipio.") ";
		$where = "";
		if($_GET["campanas"]!="0"){
			$where = " and idcampanas in (".$_GET["campanas"].") ";
		}
		$query .= $where." order by clave asc";
	}
	//echo $query;
	$res = $oMySQL->ExecuteSQL($query);
	$total = $oMySQL->records;
	$json = json_encode($res);
	if($total==1){
		
		$json = "[" . $json   . "]";
	}
	print_r($json);

?>