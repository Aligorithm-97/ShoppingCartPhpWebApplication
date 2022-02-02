<?php
ob_start();
session_start();
require_once 'connection/connect.php';
include 'usertemp/header.php';
include 'usertemp/nav.php';
if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$productsql = "SELECT * FROM store_products WHERE id=$id";
	$prodresult = mysqli_query($connection, $productsql);
	$prodres = mysqli_fetch_assoc($prodresult);
} else {
	header('location: index.php');
}
if (isset($uid)) {
	$uid = $_SESSION['customerid'];
}
?>
<section>
	<div>
		<div class="container">
			<div class="row">
				<div class="page_header text-center">
					<h2></h2>
					<p></p>
				</div>
				<div class="col-md-10 col-md-offset-1">
					<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
					<?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<div class="row">
						<div class="col-md-5">
							<div>
								<div>
									<ul>
										<li><img src="admincontrolpanel/<?php echo $prodres['thumb']; ?>" class="img-responsive" alt="" /></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<h2><?php echo $prodres['name']; ?></h2>
							<div class="space10"></div>
							<div><?php echo $prodres['price']; ?>.00 TL</div>
							<p><?php echo $prodres['description']; ?></p>
							<form method="get" action="addcart.php">
								<div>
									<span>Quantity:</span>
									<input type="hidden" name="id" value="<?php echo $prodres['id']; ?>">
									<input type="text" name="amount" placeholder="1">
								</div>
								<div>
									<input type="submit" class="button btn-small" value="Add to Cart">
								</div>
							</form>
							<div>
								<span>Categories:
									<?php
									$prodcatsql = "SELECT * FROM categories WHERE id={$prodres['catid']}";
									$prodcatres = mysqli_query($connection, $prodcatsql);
									$prodcatr = mysqli_fetch_assoc($prodcatres);
									?>
									<a href="#"><?php echo $prodcatr['name']; ?></a></span><br>
							</div>
						</div>
					</div>
					<div>
						<div>
							<ul>
								<li class="active col-md-12">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
							</ul>
						</div>
						<div style="height: auto;">
							<div>
								<p>T<?php echo $prodres['description']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>