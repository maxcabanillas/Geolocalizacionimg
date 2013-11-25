<?PHP
//Inicio la sesion
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($_SESSION["autentificado"] != "1") {
	//si no existe, se dirige a la Pgina de Inicio
	header("Location: login.php");
	exit();
}	
?>
