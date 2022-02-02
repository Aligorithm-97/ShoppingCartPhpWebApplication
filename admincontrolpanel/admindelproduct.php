<?php
session_start();
require_once '../connection/connect.php';
if (!isset($_SESSION['email']) & empty($_SESSION['email'])) {
	header('location: adminlogin.php');
}
if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sqlquery = "SELECT thumb FROM store_products WHERE id=$id";
	$res = mysqli_query($connection, $sqlquery);
	$r = mysqli_fetch_assoc($res);
	if (!empty($r['thumb'])) {
		if (unlink($r['thumb'])) {
			$delsql = "DELETE FROM store_products WHERE id=$id";
			if (mysqli_query($connection, $delsql)) {
				header("location:adminproducts.php");
			}
		}
	} else {
		$delsql = "DELETE FROM store_products WHERE id=$id";
		if (mysqli_query($connection, $delsql)) {
			header("location:adminproducts.php");
		}
	}
} else {
	header('location: adminproducts.php');
}
