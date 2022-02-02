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
if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] == true){
		$countryname = filter_var($_POST['countryname'], FILTER_SANITIZE_STRING);
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
		$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
		$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phonenumber'], FILTER_SANITIZE_NUMBER_INT);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);

		$sqlq = "SELECT * FROM info_users WHERE uid=$uid";
		$res = mysqli_query($connection, $sqlq);
		$r = mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);
		if($count == 1){
			
			$upsql = "UPDATE info_users SET country='$countryname', firstname='$firstname', lastname='$lastname', address1='$address1', address2='$address2', city='$city', state='$state',  zip='$zip', company='$company', mobile='$phone' WHERE uid=$uid";
			$upres = mysqli_query($connection, $upsql) or die(mysqli_error($connection));
			if($upres){

				$total = 0;
				foreach ($cart as $key => $value) {
					
					$ordersql = "SELECT * FROM store_products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordersql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosqlq = "INSERT INTO store_orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosqlq) or die(mysqli_error($connection));
				if($iores){
					
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						
						$ordersql = "SELECT * FROM store_products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordersql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO numberoforder (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
						
					}
				}
				unset($_SESSION['cart']);
				header("location: useraccount.php");
			}
		}else{	
			$insql = "INSERT INTO info_users (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$countryname', '$firstname', '$lastname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
			$ires = mysqli_query($connection, $insql) or die(mysqli_error($connection));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					$ordersql = "SELECT * FROM store_products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordersql);
					$ordr = mysqli_fetch_assoc($ordres);
					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO store_orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						$ordersql = "SELECT * FROM store_products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordersql);
						$ordr = mysqli_fetch_assoc($ordres);
						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];
						$orditmsql = "INSERT INTO numberoforder (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
					}
				}
				unset($_SESSION['cart']);
				header("location: useraccount.php");
			}
		}
	}else{
		$message = "Please accept the terms";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
}
$sql = "SELECT * FROM info_users WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>
	<section>
		<div>
					<div class="page_header text-center">
						<h2>Shop</h2>
						<p></p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div>
						<h3>Billing Details</h3>
							<label class="">Country </label>
							<select name="countryname" class="form-control">
								<option value="">Select Country</option>
								<option value="CH">China</option>
								<option value="GR">Germany</option>
								<option value="UK">United Kingdom</option>
								<option value="AU">Australia</option>
								<option value="KR">Korea</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="TR">Turkey</option>
							</select>		 
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="firstname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($firstname)){ echo $firstname; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lastname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lastname)){ echo $lastname; } ?>" type="text">
								</div>
							</div>	 
							<label>Company Name</label>
							<input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>" type="text">		 
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; } elseif(isset($address1)){ echo $address1; } ?>" type="text"> 
							<input name="address2" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2; } ?>" type="text">
							<div class="row">
								<div class="col-md-4">
									<label>City </label>
									<input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>" placeholder="State" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zipcode" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zip)){ echo $zip; } ?>" type="text">
								</div>
							</div>
							<label>Phone </label>
							<input name="phonenumber" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['mobile'])){ echo $r['mobile']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">	
					</div>
				</div>
			</div>
			<h4 class="heading">Payment Method</h4>
			<div>
				<div class="row">
						<div class="col-md-4">
							<input name="payment" id="radio2" class="css-checkbox" value="ccod" type="radio"><span>Credit Card On Delivery</span>
							<p>You can pay with your credit card on delivery.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" value="cod" type="radio" ><span>Cash On Delivery</span>
							<p>You can pay with your cash on delivery.</p>
						</div>
				</div>
					<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span><br>
				<input type="submit" class="button btn-lg" value="Pay Now">
			</div>
		</div>		
</form>		
		</div>
	</section>
	

