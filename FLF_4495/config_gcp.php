<?php
$servername = "localhost";
$username = "**************";
$password = "**************";



$con = new mysqli($servername, $username, $password, "*************");
if (!$con){
	die("Failed:" . mysqli_connect_error());
}else{
//echo "Connected successfully";
}



?>
