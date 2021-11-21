<?php

$host	= "localhost";
$user 	= "root";
$pass 	= "";
$mydb	= "kasir";

$con = mysqli_connect($host, $user, $pass, $mydb);
if ($con->connect_error) {
	echo "Failed Connect to database : (" . $con->connect_error . ")";
}