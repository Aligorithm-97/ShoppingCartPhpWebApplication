<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
<nav class="navbar navbar-default" role="navigation">
				<ul style="font-size: 25px" class="container-fluid">
					<li>
						<a style="color:black" href="index.php">Dashboard</a>
					</li>
					<li class="dropdown">
					<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="admincategories.php">View Categories</a></li>
							<li><a href="adminaddcategory.php">Add Category</a></li>
						</ul>
					</li>
					<li class="dropdown">
					<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="adminproducts.php">View Products</a></li>
							<li><a href="adminaddproduct.php">Add Product</a></li>
						</ul>
					</li>

					<li class="dropdown">
					<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Orders<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="adminorders.php">View Orders</a></li>
						</ul>
					</li>
					<li class="dropdown">
					<a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown">Customers<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="admincustomers.php">View Customers</a></li>
						</ul>
					</li>
					<li>
						<a style="color:black" href="logout.php">Logout</a>
					</li>
				</ul>
				</nav>
			</div>
	<style>
	body {
    margin: 30px 0px;
}
.navbar{
	background-color: #ed9121;
}
.navbar-default .navbar-nav > li.dropdown:hover > a, 
.navbar-default .navbar-nav > li.dropdown:hover > a:hover,
.navbar-default .navbar-nav > li.dropdown:hover > a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}
li.dropdown:hover > .dropdown-menu {
    display: block;
}
</style>