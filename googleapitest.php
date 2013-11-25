<?php
session_start();
require_once dirname(__FILE__).'/GoogleClientApi/src/Google_Client.php';
require_once dirname(__FILE__).'/GoogleClientApi/src/contrib/Google_AnalyticsService.php';

$scriptUri = "http://".$_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];

$client = new Google_Client();
$client->setAccessType('online'); //  offline
$client->setApplicationName('Geolocalizacionimg');
$client->setClientId('949439574515-08vfk55c517hcc69spfjph0q0msbgqma.apps.googleusercontent.com');
$client->setClientSecret('nfNWBnQi1vkVIuGCJWEb_UGV');
$client->setRedirectUri($scriptUri);
$client->setDeveloperKey('AIzaSyCkKb0TzS8nk8ENjW9TjvL4xHbP98U-rVY'); // API key

// implementa la vista del usuario antes de enviarse la peticion
$service = new Google_AnalyticsService($client);

if (isset($_GET['logout'])) { // destruye token
    unset($_SESSION['token']);
	die('Logged out.');
}

if (isset($_GET['code'])) { // se recibe el token y se sguarda en sesion
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extrae el token de la sesion y configura el cliente
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // LLamado a google
    $authUrl = $client->createAuthUrl();
    header("Location: ".$authUrl);
    die;
}
include("googlecallback.php");