<?php
	/*$server = "192.168.19.140";
	$username = "pp8678";
	$pass = "8678";
	$db = "8678";*/

	$server = "localhost";
	$username = "root";
	$pass = "";
	$db = "testing";
 
	//create connection 
 
	$conn = mysqli_connect($server,$username,$pass,$db);
	$dbcon = mysqli_select_db($conn,$db);
 
	//check conncetion
 
	if($conn->connect_error){
 
		die ("Connection Failed!". $conn->connect_error);
	}
 
?>