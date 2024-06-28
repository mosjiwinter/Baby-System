<?php

$servername = "192.168.1.94";
$username = "root";
$password = "123456789";
$dbname = "project_ibeacon";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {die("Connection failed" . mysqli_connect_error());} 
else{ /*echo "connected";*/ }

?>