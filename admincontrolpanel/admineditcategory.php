<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$idnumber = $_GET['id'];
	}else{
		header('location: admincategories.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$idnumber = mysqli_real_escape_string($connection, $_POST['id']);
		$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
		$sqlq = "UPDATE categories SET name = '$name' WHERE id=$idnumber";
		$res = mysqli_query($connection, $sqlq);
		if($res){
			$smsg = "Category Updated";
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
			    <?php 	
					$sql = "SELECT * FROM categories WHERE id=$idnumber";
					$res = mysqli_query($connection, $sql); 
					$r = mysqli_fetch_assoc($res); 
				?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			    <input type="text" class="form-control" name="categoryname" id="Categoryname" placeholder="Category Name" value="<?php echo $r['name'];  ?>">
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>

