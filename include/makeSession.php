<?php date_default_timezone_set('Asia/Kolkata'); include'config.inc.php';
	session_start();		
	if(!isset($_SESSION['username'])||!isset($_SESSION['mail']))
	{
		header("Location:index.php");
	}else{
		// Assigning username from Session variable
		$username = $_SESSION['username'];
		$mail = $_SESSION['mail'];
		$uid = $_SESSION['id'];
	}
?>