<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}
	if(isset($_POST) & !empty($_POST)){
		$catname = mysqli_real_escape_string($connection, $_POST['catname']);
		$sqlque = "INSERT INTO categories (name) VALUES ('$catname')";
		$r = mysqli_query($connection, $sqlque);
		if($r){
			$smsg = "Category Added";
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
			<form method="post">
			  <div class="form-group">
			    <label for="Productname">Category Name</label>
			    <input type="text" class="form-control" name="catname" id="catname" placeholder="Category Name">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
