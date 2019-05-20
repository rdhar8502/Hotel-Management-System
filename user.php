<?php 
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
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
					<a href="user_home.php">
						<div class="image admin-image"><img src="image/home-icon.png">
						<p>Home</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="reception.php">
						<div class="image admin-image"><img src="image/employee.png">
						<p>Reception</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="gallery.php">
						<div class="image admin-image"><img src="image/gallery-icon_1591969.png">
						<p>Gallery</p>
						</div>
					</a>
				</div>
			</div>
			<br>
			<div class="row content-body">
				<div class="col-md-4">
					<a href="contact.php">
						<div class="image admin-image"><img src="image/flat_seo2-18-512.png">
						<p>Contact Us</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="feedback.php">
						<div class="image admin-image"><img src="image/multiple-forums.png">
						<p>Customer Feedback</p>
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
			<div class="row">
        <div class="col-sm-12">
            <p class="back-link">Hotel Regent Developed by <a href="#">Rahul Dhar</a></p>
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