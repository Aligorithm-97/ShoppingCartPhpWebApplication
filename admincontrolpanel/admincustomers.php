<?php
	session_start();
	require_once '../connection/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: adminlogin.php');
	}
?>
<?php include 'admintemp/header.php'; ?>
<?php include 'admintemp/nav.php'; ?>
	
<section>
	<div>
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Customer Mobile</th>
						<th>Customer Email</th>
						<th>Customer From</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sqlq = "SELECT * FROM store_users u JOIN info_users u1 WHERE u.id=u1.uid";
					$res = mysqli_query($connection, $sqlq); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
						<td><?php echo $r['mobile']; ?></td>
						<td><?php echo $r['email']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>

