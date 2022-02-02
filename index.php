<?php
session_start();
require_once 'connection/connect.php';
include 'usertemp/header.php'; ?>
<?php include 'usertemp/nav.php'; ?>
<section>
	<div>
		<div class="container">
			<div class="row">
				<div class="page_header text-center">
					<h2>Welcome</h2>
					<p>Order now and we bring it to you!</p>
				</div>
			</div>
			<div class="row">
				<div>
					<div>

                        
						<?php
						$sql = "SELECT * FROM store_products";
						if (isset($_GET['id']) & !empty($_GET['id'])) {
							$idnumber = $_GET['id'];
							$sql .= " WHERE catid=$idnumber";
						}
						$res = mysqli_query($connection, $sql);
						while ($r = mysqli_fetch_assoc($res)) {
						?>
							<div class="col-md-4">
								<div class="product">
									<div class="product-thumb">
										<img src="admincontrolpanel/<?php echo $r['thumb']; ?>" class="img-responsive" width="250px" height="250px" alt="">
									</div>
									<h2 class="product-title"><a href="productpagesingle.php?id=<?php echo $r['id']; ?>"><?php echo $r['name']; ?></a></h2>
									<div class="product-price"><?php echo $r['price']; ?> TL<span></span></div>
									<h4>100 pieces left</h4>
									<?php // echo $r['productamount'] 
									?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
</section>