<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<div class="container">
				<nav style="font-size: 30px;" class="navbar navbar-default" role="navigation">
				<ul class="container-fluid">
					<a>
						<a style="color:black" href="http://localhost/ise/index.php">Home</a>
					</a>
					<li class="dropdown">
					<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<?php
							$catsqlq = "SELECT * FROM categories";
							$catres = mysqli_query($connection, $catsqlq);
							while($catr = mysqli_fetch_assoc($catres)){
						 ?>
							<li><a href="index.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
						<?php } ?>
						</ul>
					</li>
					<li>
						<a> <a style="color:black" href="http://localhost/ise/contact.php">Contact</a></a>
					</li>
					<li class="dropdown">
						<div></i></div>
						<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="http://localhost/ise/useraccount.php">My Orders</a></li>
							<li><a href="http://localhost/ise/logout.php">Logout</a></li>
						</ul>
					</li>
					
				</ul>
				</nav>
			</div>
			<div>
			<?php if(isset($_SESSION['cart'])){ ?>
				<div class="nav navbar-nav navbar-right">
				<?php $cart = $_SESSION['cart'];?>
					<div class="dropdown">
						<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php
								echo count($cart); ?></em></div>

						<div class="cart-info">
							<small>You have <em class="highlight"><?php
								echo count($cart); ?> item(s)</em> in your shopping bag</small>
							<br>
							<br>
							<?php
								$total = 0;
								foreach ($cart as $key => $value) {
									$navcartsql = "SELECT * FROM store_products WHERE id=$key";
									$navcartres = mysqli_query($connection, $navcartsql);
									$navcartr = mysqli_fetch_assoc($navcartres);

								
							 ?>
							<div class="ci-item">
								<img src="admincontrolpanel/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
								<div class="ci-item-info">
									<h5><a href="productpagesingle.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0 , 20); ?></a></h5>
									<p><?php echo $value['quantity']; ?> x TL <?php echo $navcartr['price']; ?>.00/-</p>
									<div class="ci-edit">
										<a href="deletecart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
									</div>
								</div>
							</div>
							<?php 
							$total = $total + ($navcartr['price']*$value['quantity']);
							} ?>
							<div class="ci-total">Subtotal: TL <?php echo $total; ?>.00/-</div>
							<div class="cart-btn">
								<a href="usercart.php">View Bag</a>
								<a style="color: #ed9121;" href="payment.php">Buy now</a>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
				</div>
			<style>
	body {
    margin: 30px 0px;
}
.navbar{
	background-color: #ed9121;
}
.navbar-default .navbar-nav > li.dropdown:hover > a, 
.navbar-default .navbar-nav > li.dropdown:hover > a:hover,
.navbar-default .navbar-nav > li.dropdown:hover > a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}
li.dropdown:hover > .dropdown-menu {
    display: block;
}
</style>