<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Hotel Regent</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('image/background-home.jpg');background-repeat: no-repeat;
	background-size: cover;">
<header class="header header-page">
		<div class="container">
		<div class="row">
			<div class="col-md-11">
				<div class="header-text">
				<a class="logo" href="index.php"><h2>Hotel Regent</h2></a>
				</div>
			<!-- notification message -->
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success" >
						<h3>
							<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
				</div>
				<!-- logged in user information -->
				<div class="profile_info">
						<div class="col-md-1 user-pic"><img src="image/user.png" ></div>

						<div class="col-md-1 user-info">
							<?php  if (isset($_SESSION['user'])) : ?>
								<strong><?php echo $_SESSION['user']['name']; ?></strong>

								<small>
									<i  style="color: white; font-size:15px;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
									<br>
									<a href="index.php?logout='1'" style="color: red; font-size:14px;">logout</a>
								</small>

							<?php endif ?>
						</div>
				</div>
		</div>
		
		</div>
	</header>
	<section>
		<div class="container content-menu">
			<div class="row content-body">
				<div class="col-md-4">
					<a href="home.php">
						<div class="image admin-image"><img src="image/home-icon.png">
						<p>Home</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="employee.php">
						<div class="image admin-image"><img src="image/employee.png">
						<p>Staff</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="customer.php">
						<div class="image admin-image"><img src="image/customer.png">
						<p>Customer</p>
						</div>
					</a>
				</div>
			</div>
			<br>
			<div class="row content-body">
				<div class="col-md-4 col-md-offset-2">
					<a href="project.php">
						<div class="image admin-image"><img src="image/project-management-536789.png">
						<p>Project</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="index.php?logout='1'">
						<div class="image admin-image"><img src="image/logout.png">
						<p>Logout</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<script src=".js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
<footer>
	<div class="row">
		<div class="col-md-12">
			<div class="footer">
				<p>Project Developed by Rahul Dhar</p>
			</div>
		</div>
	</div>
</footer>
</html>