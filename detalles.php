<?php
	include_once('clases/MySQL.php');
	include_once('GLOBALS.php');

	$idEsp=$_GET["id"];
	$idTipo = $_GET["tipo"];
	$idcampana = $_GET["idcampana"];
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
//echo $idEsp;

	if($idTipo==1){		
		
		$semaforo = "";
		$query="select es.idEspectacular, es.idciudad, es.Clave, es.Latitud, es.Longitud, Direccion, Icono, w, h, Foto, es.Activo,
					cd.nombre_ciudad, esv.idespectaculares_vigencia, esv.idespectaculares, v.idvigencia, v.fecha_ini, v.fecha_fin,
					v.idcampana, v.activo, c.idcampanas, c.nombre, c.observaciones, DATEDIFF(fecha_fin,CURDATE()) as datedif
				from ciudades cd left join espectaculares es on
					es.idciudad = cd.idciudad
					left join espectaculares_vigencia esv on
					es.idespectacular = esv.idespectaculares left join 
					vigencia v on v.idvigencia = esv.idvigencia
				left join campanas c on c.idcampanas = v.idcampana
		        where idespectacular=" .$idEsp." and es.activo=1 and c.idcampanas=".$idcampana;

			//echo $query;	
		$res = $oMySQL->ExecuteSQL($query);
		echo "<img src='".$res["Foto"]."' style='width:100%;height:90%;'>";
		echo "Ciudad: ".$res["nombre_ciudad"].".		";
		echo "Clave: ".$res["Clave"].".		";
		echo "Medidad: ".$res["w"]." x ".$res["h"].".</br>"; 
		echo "Campana: ".$res["nombre"]."."; 	
		$num = (int)$res["datedif"];
		if($res["fecha_fin"] != "0000-00-00"){
				if($num <= 5){
					$semaforo = "rojo";
				}
				if($num < 10 && $num > 5){
					$semaforo = "amarillo";
				}
				if($num >= 10){
					$semaforo = "verde";
				}
			}else{
				$semaforo = "verde";
			}
		echo "<img src='img/semaforo/".$semaforo.".png'></br>";
		
	}
	elseif($idTipo==2){
		$query="SELECT Foto, nombre_ciudad, b.Clave, Medidas, c.nombre FROM campanas c join bardas b on
		b.idcampanas = c.idcampanas
		join ciudades cd on
		cd.idciudad=b.idciudades
		where b.idBarda=" . $idEsp." and b.activo = 1";
		//echo $query;
		$res = $oMySQL->ExecuteSQL($query);
		echo "<img src='".$res["Foto"]."' style='width:100%;height:90%;'>";
		echo "Ciudad: ".$res["nombre_ciudad"].".		";
		echo "Clave: ".$res["Clave"].".		";
		echo "Medidad: ".$res["Medidas"].".</br>";
		echo "Campana: ".$res["nombre"].".</br>"; 
	}
	

 
?>