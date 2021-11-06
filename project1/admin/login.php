<?php 

	session_start();

	require_once('functions.php');


	if(user_logged_in()){
		header('location: profile.php');
		die();
	}


	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		

		if(email_exists()){
			
			$password_query = mysqli_query($connection, "SELECT password FROM users WHERE email = '$email'");

			$row = mysqli_fetch_assoc($password_query);

			if(md5($password) == $row['password']){
				$_SESSION['success'] = "logged in";

				header('location: profile.php');
			}
			else {
				echo "password does not match";
			}
			

		}
		else {
			echo "email does not exist in database";
		}

	}

	


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<form action="" method="POST">
		<input type="email" placeholder="email" name="email">
		<input type="password" placeholder="password" name="password">
	
		<input type="submit" name="login" value="login">
	</form>

	If you not existing user, please <a href="register.php">Register</a>



</body>
</html>