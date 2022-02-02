<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}
	if(isset($_GET) & !empty($_GET)){
		$idnumber = $_GET['id'];
	}else{
		header('location: adminproducts.php');
	}
	if(isset($_POST) & !empty($_POST)){
		$productname = mysqli_real_escape_string($connection, $_POST['productname']);
		$desc = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$cat = mysqli_real_escape_string($connection, $_POST['productcategory']);
		$productprice = mysqli_real_escape_string($connection, $_POST['productprice']);
		$sqlq = "UPDATE store_products SET name='$productname', description='$desc', catid='$cat', price='$productprice' WHERE id = $idnumber";
		$res = mysqli_query($connection, $sqlq);
		if($res){
			$smsg = "Updated";
		}else{
			$fmsg = "Failed";
		}
	}
?>
<?php include 'admintemp/header.php'; ?>
<?php include 'admintemp/nav.php'; ?>
<section>
	<div>
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php 	
				$sqlquery = "SELECT * FROM store_products WHERE id=$idnumber";
				$res = mysqli_query($connection, $sqlquery); 
				$r = mysqli_fetch_assoc($res); 
			?>
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">
			  <input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name" value="<?php echo $r['name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"><?php echo $r['description']; ?></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
			    <?php 	
					$catsql = "SELECT * FROM categories";
					$catres = mysqli_query($connection, $catsql); 
					while ($catr = mysqli_fetch_assoc($catres)) {
				?>
					<option value="<?php echo $catr['id']; ?>" <?php if( $catr['id'] == $r['catid']){ echo "selected"; } ?>><?php echo $catr['name']; ?></option>
				<?php } ?>
				</select>
			  </div>
			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price" value="<?php echo $r['price']; ?>">
			  </div>
			  <div class="form-group">
			    <labefl for="productimage">Product Image</label>
			    <?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
			    <br>
			    	<img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
			    <?php }else{ ?>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			    <?php } ?>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

