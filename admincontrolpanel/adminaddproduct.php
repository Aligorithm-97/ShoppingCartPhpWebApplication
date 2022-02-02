<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$productname = mysqli_real_escape_string($connection, $_POST['productname']);
		$desc = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$cat = mysqli_real_escape_string($connection, $_POST['category']);
		$proprice = mysqli_real_escape_string($connection, $_POST['productprice']);


		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['productimage']['name'];
			$imgsize = $_FILES['productimage']['size'];
			$imgtype = $_FILES['productimage']['type'];
			$tmp = $_FILES['productimage']['tmp_name'];

			$max_size = 20000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $imgtype == "image/jpeg" && $imgsize<=$max_size){
					$location = "images/";
					if(move_uploaded_file($tmp, $location.$name)){
						$sqlq = "INSERT INTO store_products (name, description, catid, price, thumb) VALUES ('$productname', '$desc', '$cat', '$proprice', '$location$name')";
						$res = mysqli_query($connection, $sqlq);
						if($res){
							header('location: adminproducts.php');
						}else{
							$fmsg = "Failed to Create";
						}
					}else{
						$fmsg = "Failed to Upload";
					}
				}else{
					$fmsg = "Image should be in JPG format and should be less that 2MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sqlq = "INSERT INTO store_products (name, description, catid, price) VALUES ('$productname', '$desc', '$cat', '$proprice')";
			$res = mysqli_query($connection, $sqlq);
			if($res){
				header('location: adminproducts.php');
			}else{
				$fmsg =  "Failed";
			}
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
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="category">Product Category</label>
			    <select class="form-control" id="category" name="category">
				  <option value="">---SELECT CATEGORY---</option>
				  <?php 	
					$sqlq = "SELECT * FROM categories";
					$resq = mysqli_query($connection, $sqlq); 
					while ($r = mysqli_fetch_assoc($resq)) {
				?>
					<option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
				<?php } ?>
				</select>
			  </div>
			  

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
			  </div>
			  <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>