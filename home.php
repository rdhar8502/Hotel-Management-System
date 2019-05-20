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
<body style="background-image: url('image/suite.jpg');background-repeat: no-repeat;
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
				<div class="col-md-3">
					<a href="room_mang.php">
						<div class="image"><img src="image/room.jpg">
						<p>Room Management</p>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="reservation.php">
						<div class="image"><img src="image/reservation.png">
						<p>Reservation</p>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="complain_managment.php">
						<div class="image"><img src="image/complains.png">
						<p>Complains</p>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="index.php">
						<div class="image"><img src="image/logout.png">
						<p>Exit</p>
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