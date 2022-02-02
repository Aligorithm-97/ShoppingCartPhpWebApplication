<?php
session_start();
if(isset($_GET) & !empty($_GET)){
	$id = $_GET['id'];
	if(isset($_GET['amount']) & !empty($_GET['amount'])){ $quant = $_GET['amount']; }else{ $quant = 1;}
	$_SESSION['cart'][$id] = array("quantity" => $quant); 
	header('location: usercart.php');

}else{
	header('location: usercart.php');
}
print_r($_SESSION['cart']);
?>