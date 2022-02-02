<?php 
session_start();
require_once 'connection/connect.php'; 
if(isset($_POST) & !empty($_POST)){
	$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['password'];
	$sqlque = "SELECT * FROM store_users WHERE email='$mail'";
	$resq = mysqli_query($connection, $sqlque) or die(mysqli_error($connection));
	$count = mysqli_num_rows($resq);
	$r = mysqli_fetch_assoc($resq);

	if($count == 1){
		if(password_verify($password, $r['password'])){
			$_SESSION['customer'] = $mail;
			$_SESSION['customerid'] = $r['id'];
			header("location: payment.php");
		}else{
			header("location: login.php?message=1");
		}
	}else{
		header("location: login.php?message=1");
	}
}
?>