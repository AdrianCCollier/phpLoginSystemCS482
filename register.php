<?php # opening php tag 

# linking
require_once "connection.php";

# be able to populate superglobal $_SESSION with data
session_start();

# If user is already logged in, redirect them to welcome.php
# beginning of register logic
if(isset($_SESSION['user'])) {
	header("Location: welcome.php");
} // end if 

# if a user clicks on the register button, request input
if(isset($_REQUEST['register_btn'])) {

	# delete later, debugging, print what is being sent
	echo "<pre>";
	    print_r($_REQUEST);
	echo "</pre>";


	# store user input into our account variables

	# enforce name to be string only, no sql queries or links
	$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);

	# enforce email to be in proper format
	$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);

	# enforce password to not have html tags 
	$password = $_REQUEST['password'];

	# enforce name field to not be empty
	if(empty($name)) {
		$errorMsg[0][] = 'Name required';
	}

	# enforce email to not be empty
	if(empty($email)) {
		$errorMsg[1][] = 'Email required';
	}

	# enforce password to not be empty
	if(empty($password)) {
		$errorMsg[2][] = 'Password required';
	}

	# enforce proper password length
	if(strlen($password) < 6) {
		$errorMsg[2][] = 'Password must be at least 6 characters';
	}

} // end if



?> 

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<title>Register</title>
</head>
<body>
	<div class="container">
		
		<form action="register.php" method="post">
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Jane Doe">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="jane@doe.com">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" placeholder="">
				
			</div>
			<button type="submit" name="register_btn" class="btn btn-primary">Register Account</button>
		</form>
		Already Have an Account? <a class="register" href="index.php">Login Instead</a>
	</div>
</body>
</html>