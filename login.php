<?php
session_start();
require_once 'connection/connect.php';
include 'usertemp/header.php';
include 'usertemp/nav.php'; ?>

<div class="container">
	<div class="row">
		<div class="page_header text-center">
			<h2>Shop - Account</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div>
					<div>
						<h3 class="heading text-center">Already have an account</h3>
						<h2 style="padding-left:145px;">Login</h2>
						<?php if (isset($_GET['message'])) {
							if ($_GET['message'] == 1) {
						?><div class="alert alert-danger" role="alert"> <?php echo "Wrong email or password"; ?> </div>

						<?php }
						} ?>
						<form id="myform" class="logregform" method="post" action="loginprocedure.php" style="background-color: white; width: 500px;">
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
    						margin-left: 50px;" id="button" name="login" value="login" type="submit"><b>
									Login
								</b>
							</button>
							<br /><br />
							<p id="message"></p>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div>
					<h3 style="padding-bottom:50px;" class="heading text-center">Register An Account</h3>
					<div class="clearfix space40"></div>
					<?php if (isset($_GET['message'])) {
						if ($_GET['message'] == 2) {
					?><div class="alert alert-danger" role="alert"> <?php echo "Failed to Register"; ?> </div>
					<?php }
					} ?>
					<form id="myform2" class="logregform" method="post" action="registerprocedure.php" style="background-color: whitesmoke">
						<img style="height: 100px;margin-left:125px" id="img" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/b666f811889067.562541eff3013.png" alt="avatar" />
						<br /><br />
						<br /><br />
						<label style="margin-left: 50px; font-size: 18px">Username :</label>
						<input style="font-size: 20px" size="15px" id="email" type="email" name="email" value="" placeholder="Username" required />
						<br /><br />
						<br /><br />
						<label style="margin-left: 50px; font-size: 19px">Password :</label>
						<input style="font-size: 20px" size="15px" id="password" name="password" type="password" value="" placeholder="Password" required />
						<br /><br />
						<br /><br />
						<button class="loginbutton" style="text-align: center; width: 270px; height:50px; background-color: green;
    					margin-left: 50px;" id="button" name="login" value="login" type="submit"><b>Register</b>

						</button>
						<br /><br />
						<p id="message"></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="jscript/validation.js" type="text/javascript">
	var frmvalidator = new Validator("myform2");
	frmvalidator.addValidation("email", "req", "Please enter  email");
	frmvalidator.addValidation("password", "req", "Please enter  password");
	frmvalidator.addValidation("password", "minlen=6", "Password must not be less than 6 characters.");
</script>