<?php
session_start();
require_once '../connection/connect.php';
if (isset($_POST) & !empty($_POST)) {
	$mail = mysqli_real_escape_string($connection, $_POST['email']);
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM admin WHERE email='$mail' AND password='$password'";
	$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		$_SESSION['email'] = $mail;
		header("location: index.php");
	} else {
		$fmsg = "Wrong email or password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ISE 311 CART APP ADMIN</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body class="multi-page">
	<div>
		<section>
			<div>
				<div class="container">
					<div class="row">
						<div class="page_header text-center">
							<h2 style="padding-top:50px;">Login</h2>
							<p>Admin Login</p>
						</div>
						<div class="col-md-12">
							<div class="row shop-login">
								<div class="col-md-6 col-md-offset-3">
									<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
									<div class="box-content">
										<div class="clearfix space40"></div>
										<form id="myform" class="logregform" method="post" style="background-color: whitesmoke; width:400px;margin-left: 450px;
    	margin-right: 200px;
 		margin-top: 30px;
    	padding: 20px;
    	padding-bottom: 100px;
    	padding-top: 20px">
											<img style="height: 100px;margin-left:125px" id="img" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/b666f811889067.562541eff3013.png" alt="avatar" />
											<br /><br />
											<br /><br />
											<label style="margin-left: 50px; font-size: 18px">Username :</label>
											<input style="font-size: 20px" size="15px" id="email" type="email" name="email" value="" placeholder="Username" />
											<br /><br />
											<br /><br />
											<label style="margin-left: 50px; font-size: 19px">Password :</label>
											<input style="font-size: 20px" size="15px" id="password" name="password" type="password" value="" placeholder="Password" />
											<br /><br />
											<br /><br />
											<button class="loginbutton" style="text-align: center; width: 270px; height:50px; background-color: green;
    	margin-left: 50px;" id="button" name="login" value="login" type="submit">
												<b>Login</b>
											</button>
											<br /><br />
											<p id="message"></p>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>

</html>