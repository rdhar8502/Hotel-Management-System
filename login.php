<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header class="header header-page">
		<div class="container">
			<div class="row">
			<center>
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
					</center>
					<!-- logged in user information -->
			</div>
		</div>
	</header>
	<div class="header">
		<img src="image/user.png" alt="Hotel">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="form-input-group form-input">
			<label>Email</label>
			<input type="text" name="email" >
		</div>
		<div class="form-input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="form-input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p class="signup">
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<script src="js/jquery.js"></script>
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