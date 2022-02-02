<?php 
	ob_start();
	session_start();
	require_once 'connection/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}
include 'usertemp/header.php'; 
include 'usertemp/nav.php'; 
$uid = $_SESSION['customerid'];
if(isset($cart)){
	$cart = $_SESSION['cart'];
}
?>
	<section>
		<div>
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">
			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status of the Product</th>
						<th>Payment Mode</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$ordersql = "SELECT * FROM store_orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordersql);
					while($order = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $order['id']; ?>
						</td>
						<td>
							<?php echo $order['timestamp']; ?>
						</td>
						<td>
							<?php echo $order['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $order['paymentmode']; ?>
						</td>
						<td>
							TL <?php echo $order['totalprice']; ?>/-
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		
			<br>
			<br>
			<br>

					</div>
				</div>
			</div>
		</div>
	</section>

