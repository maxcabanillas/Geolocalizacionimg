<?php
include_once("GLOBALS.php");
define('DB_SERVER', SERVIDOR);
define('DB_USERNAME', USUARIO);
define('DB_PASSWORD', CLAVE);
define('DB_DATABASE', BASE);

define('USERS_TABLE_NAME', 'users_table_name'); //Replace your users table name here
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>