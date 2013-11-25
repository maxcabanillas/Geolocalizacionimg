<?php
define('CLIENTID','949439574515-08vfk55c517hcc69spfjph0q0msbgqma.apps.googleusercontent.com');
define('CLIENTSECRET','nfNWBnQi1vkVIuGCJWEb_UGV');
define('URLCALLBACK', 'http://localhost:82/Comunicacion/Geolocalizacionimg/googleapitest.php');
define('URL','http://localhost:82/');
 
function request_token($code){
//Solicita el token a google con el código pasado
	$tokendata = array();
	
	$ch = curl_init('https://accounts.google.com/o/oauth2/token');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "code=".$code."&client_id=".CLIENTID."&client_secret=".CLIENTSECRET."&redirect_uri=".URLCALLBACK."&grant_type=authorization_code");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result_curl = curl_exec($ch);
	$error_curl = curl_error($ch);
	curl_close($ch);

	$res = json_decode($result_curl);
	//print_r($res);
	if ($res->access_token){
		$tokendata['token_access']=$res->access_token;
	}
	if ($res->token_type){
		$tokendata['token_type']=$res->token_type;
	}
	if ($res->expires_in){
		$tokendata['token_expires_in']=$res->expires_in;
	}
	if ($res->id_token){
		$tokendata['token_id']=$res->id_token;
	}
	return $tokendata;
}
$code='';
$param='';
$tokendata = array();
 
if(isset($_GET['code']) && $_GET['code']){
	$code = $_GET['code'];
}
 
if ($code){
	$tokendata = request_token($code);
}
//include("googleemail.php");
?>