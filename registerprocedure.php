<?php 
session_start();
require_once 'connection/connect.php'; 
if(isset($_POST) & !empty($_POST)){
	$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	echo $sqlque = "INSERT INTO store_users (email, password) VALUES ('$mail', '$password')";
	$resq = mysqli_query($connection, $sqlque) or die(mysqli_error($connection));
	if($resq){
		$_SESSION['customer'] = $mail;
		$_SESSION['customerid'] = mysqli_insert_id($connection);
		header("location: payment.php");
	}else{
		
		header("location: login.php?message=2");
	}
}

?>