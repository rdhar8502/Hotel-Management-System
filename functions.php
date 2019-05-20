<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'regent');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = $password_1;//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO `user` (`id`, `name`, `username`, `email`, `user_type`, `password`, `created_at`) VALUES 
										('2', 'Admin', 'admin1234', 'admin@admin.com', '$user_type', 'admin', CURRENT_TIMESTAMP);";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');
		}else{
			$query = "INSERT INTO `user` (`id`, `name`, `username`, `email`, `user_type`, `password`, `created_at`) VALUES 
										('2', 'Admin', 'admin1234', 'admin@admin.com', 'user', 'admin', CURRENT_TIMESTAMP);";
			mysqli_query($db, $query);


			header('location: login.php');				
		}
	}
}

if (isset($_POST['addRoom-btn'])) {
	addRoom();
}

function addRoom(){
	global $db, $errors;
	// receive all input values from the form. Call the e() function
    // defined below to escape form values

	$roomType  	 =  e($_POST['roomType']);
	$roomNo  	 =  e($_POST['roomNo']);

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {

		$query = "INSERT INTO `room` (`room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES ('$roomType', '$roomNo', NULL, '0', '0', '0')";
		mysqli_query($db, $query);
		
		$_SESSION['success']  = "Room Add successfully";
		header('location: room_mang.php');
		
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {

		$query = "SELECT * FROM `user` WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: user.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_GET['order_status'])) {
	order_status();
}

function order_status()
{
	global $db;
	$email    =  ($_SESSION['user']['email']);
	echo $email;
	$query = "SELECT * FROM `order-db` WHERE email='$email' ";
		$results = mysqli_query($db, $query);
		echo $results;

		if (mysqli_num_rows($results) >= 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: order_status.php');
			}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}