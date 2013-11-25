<?php
session_start();
include('db.php'); //Database Connection. 
if (!isset($_SESSION['google_data'])) {
// Redirection to application home page. 
header("location: index.php");
}
else
{
//echo print_r($userdata);
$userdata=$_SESSION['google_data'];
$email =$userdata['email'];
$googleid =$userdata['id'];
$fullName =$userdata['name'];
$firstName=$userdata['given_name'];
$lastName=$userdata['family_name'];
$gplusURL=$userdata['link'];
$avatar=$userdata['picture'];
$gender=$userdata['gender'];
$dob=$userdata['birthday'];
//Execture query
$sql=mysql_query("insert into users(email,fullname,firstname,lastname,google_id,gender,dob,profile_image,gpluslink) values('$email','$fullName','$firstName','$lastName','$googleid','$gender','$dob','$avatar','$gplusURL')");
?>