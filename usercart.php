<?php 
session_start();
require_once 'connection/connect.php';
include 'usertemp/header.php'; 
include 'usertemp/nav.php'; 
$cart = $_SESSION['cart'];
?>
	<section>
		<div>
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2></h2>
						<p></p>
					</div>
					<div class="col-md-12">
<table class="cart-table table table-bordered">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Product</th>
						<th>Product Price</th>
						<th>Product Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$total = 0;
					foreach ($cart as $key => $value) {
						$cartsql = "SELECT * FROM store_products WHERE id=$key";
						$cartresult = mysqli_query($connection, $cartsql);
						$cartres = mysqli_fetch_assoc($cartresult);			
				 ?>
					<tr>
						<td>
							<a href="deletecart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
						</td>
						<td>
							<a href="#"><img src="admincontrolpanel/<?php echo $cartres['thumb']; ?>" alt="" height="90" width="90"></a>					
						</td>
						<td>
							<a href="productpagesingle.php?id=<?php echo $cartres['id']; ?>"><?php echo substr($cartres['name'], 0 , 30); ?></a>					
						</td>
						<td>
							<span class="amount"><?php echo $cartres['price']; ?>.00 TL</span>					
						</td>
						<td>
							<div><?php echo $value['quantity']; ?></div>
						</td>
						<td>
							<span><?php echo ($cartres['price']*$value['quantity']); ?>.00 TL</span>					
						</td>
					</tr>
				<?php 
					$total = $total + ($cartres['price']*$value['quantity']);
				} ?>
					<tr>
						<td colspan="6">
							<div class="col-md-6"></div>
							<div class="col-md-6">
								<div class="cart-btn">
									<a href="payment.php" class="button btn-md" >Buy now</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>		
			<div>
				<div class="col-md-6">
					<h4 class="heading">Cart Totals</h4>
					<table class="table table-bordered col-md-6">
						<tbody>
							<tr>
								<th>Shipping and Handling</th>
								<td>
									Free Shipping				
								</td>
							</tr>
							<tr>
								<th>Order Total</th>
								<td><strong><span>TL <?php echo $total; ?>.00/-</span></strong> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>					
					</div>
				</div>
			</div>
		</div>
	</section>

