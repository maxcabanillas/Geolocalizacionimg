<?PHP

session_start();
include ("GLOBALS.php");
	$servidor=SERVIDOR; 
	$basededatos=BASE;	
	$dbpass=CLAVE; 
	$dbuser=USUARIO;
	$conexion=mysql_connect($servidor,$dbuser,$dbpass) ;	
	mysql_select_db($basededatos,$conexion);

	$sql = "SELECT * FROM Usuarios where usuario='".$_POST['usuario']."' and contrasena='".$_POST['password']."'";
	$resultado = mysql_query($sql);
	$Filas=mysql_num_rows($resultado);

	if($Filas>0){
	while ($campo = mysql_fetch_row($resultado)){
		//session_destroy();
		$contrasena = $_POST["password"];
		$_SESSION["autentificado"] = "1";
		//si existe crea las variables de sesion
		$_SESSION["user"]= $_POST["usuario"];
		$_SESSION["id"]=$campo[0];
		$_SESSION["pass"]= $_POST["password"];
		header ("Location: Bienvenido.php"); // redirige a la pagina de aplicacion
		//print_r($campo);
	}
	}else{
		header("Location: login.php?error=si");  // si no existe redirige a index.php
	}
?>