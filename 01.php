<?php
	
	session_start();

	if(!isset($_SESSION['login'])){
		header('location: login.php');
	}

	
	echo "ผู้ใช้ : ".$_SESSION['login'];

	
?>