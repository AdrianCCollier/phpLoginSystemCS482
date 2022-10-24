<?php
require_once "connection.php"; // linking

// beginning of register logic
session_start();

// if superglobal $_session detects a user already has an account, redirect them b//back to welcome.php
if(isset($_SESSION['user'])) {
	header("Location: welcome.php");

} // end if 

// if the register button is present in the request, start register logic
if(isset($_REQUEST['register_btn'])) {

	// test to see whether information is being received, echo preformatted text, print recursive array
	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";

	// accept user input with enhanced built in security functions 

	// enforce variable to be a string only, no mysql queries or links 
	$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
	// enforce variable to be in proper email format  
	$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
	// enforce variable to not tags or links
	$password = strip_tags($_REQUEST['password']);


	// enforce proper register credentials, display errors with associative array 

	// don't allow empty name input
	if(empty($name)) {
		$errorMsg[0][] = 'Name required';
	}

// 	// don't allow empty email input
// 	if(empty($email)) {
// 		$errorMsg[1][] = 'E-mail required';
// 	}

// 	// don't allow empty password input
// 	if(empty($password)) {
// 		$errorMsg[2][] = 'Password required';
// 	}

// 	// check password for proper length
// 	if(strlen($password) < 6) {
// 		$error[2][] = 'Must be at least 6 characters';

// } // end if 

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
			
			<!--Check to see if error message exists, output message------>	
			
			<?php
			// left to debug, error message not showing 
				if(isset($errorMsg[0 ])) {
					foreach($errorMsg[0] as $emailErrors) {
						echo "<p class='small text-danger'>".$emailErrors."</p>";
					} // end for each 
				} // end if 
			
			?>

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