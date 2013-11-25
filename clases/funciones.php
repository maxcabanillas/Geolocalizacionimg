<?php
include_once('MySQL.php');
include_once('./GLOBALS.php');

/* Variables locales */


/* Métodos publicos */
function getMunicipios(){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM ciudades order by nombre_ciudad asc";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}

function AgregarCampana($campana,$espectacular,$generica,$fecha_ini,$fecha_fin){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 if($generica == 1){
		$fecha_ini = "0000-00-00";
		$fecha_fin = "0000-00-00";
	 }else{
		$ini = explode("/",$fecha_ini);
		$fin = explode("/",$fecha_fin);
	 }
	 //echo "insert into vigencia(fecha_ini,fecha_fin,idcampana,activo) values('".$ini[2]."-".$ini[1]."-".$ini[0]."','".$fin[2]."-".$fin[1]."-".$fin[0]."',".$campana.",1)";
	 $query="insert into vigencia(fecha_ini,fecha_fin,idcampana,activo) values('".$ini[2]."-".$ini[1]."-".$ini[0]."','".$fin[2]."-".$fin[1]."-".$fin[0]."',".$campana.",1)";
  	 $res =  $oMySQL->ExecuteSQL($query);  
	 $last="select idvigencia from vigencia order by idvigencia desc limit 1";
	 $reslast = $oMySQL->ExecuteSQL($last);  
	 $lastid = $reslast["idvigencia"];
	 $espec_vig = "insert into espectaculares_vigencia(idespectaculares, idvigencia) values(".$espectacular.",".$lastid.")";
	 //echo "insert into espectaculares_vigencia(idespectaculares, idvigencia) values(".$lastid.",".$espectacular.")";
	 $agregarEsp = $oMySQL->ExecuteSQL($espec_vig); 
}

function getCampanas(){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM campanas order by nombre asc";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}

function getBardas(){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM bardas b join ciudades c on c.idciudad = b.idciudades order by clave asc";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}

function getEspectaculares(){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM espectaculares order by clave asc";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}

function getCampanasDay($id){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM campanas where idcampanas=".$id." and v.fecha_ini <= CURDATE() and v.fecha_fin >= CURDATE() order by nombre asc";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}

function getCampanasAct($id){	 
	 global $BD,$USER,$PWD,$SERVER;
	 $oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	 $query="SELECT * FROM espectaculares es join espectaculares_vigencia esv on
				esv.idespectaculares = es.idespectacular join vigencia v on
				v.idvigencia = esv.idvigencia join campanas c on
				c.idcampanas = v.idcampana
	 where es.idespectacular = ".$id."";
  	 $res =  $oMySQL->ExecuteSQL($query);  	 
  	 return  $oMySQL->arrayedResult;
}
/*
Devuelve el color del semáforo para espectaculares
*/

function getColor($arDias){
	echo $dias;
	$int_dias_rojo=2;
	$int_dias_verde=10;
	
	if($arDias<0){  // Aún faltan días
		if(abs($arDias)<=$int_dias_rojo){
			return "rojo";
		}
		elseif(abs($arDias)>=$int_dias_verde){
			return "verde";
		}
		else{
			return "ambar";
		}

	}
	elseif($arDias>0){ // Ya paso
		return "negro";
	}
	else{ // Es el mismo día
		return "rojo";
	}
}


/*
Devuelve arreglo de los detalles del anuncio, bardas y Espectaculares
*/
function getDetalles($pIntTipo, $pIntAnuncioID){ 	
	global $BD,$USER,$PWD,$SERVER;
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
    $query="SELECT * FROM tbl_ciudades";
}
function Salir(){ 
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	session_destroy();
	header("Location:index.php");
}



?>