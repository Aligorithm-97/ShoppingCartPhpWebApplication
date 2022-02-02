<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
		$sqldel = "DELETE FROM categories WHERE id='$id'";
		if(mysqli_query($connection, $sqldel)){
			header('location:admincategories.php');
		}
	}else{
		header('location: admincategories.php');
	}
?>