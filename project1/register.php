<?php 

	session_start();

	require_once('functions.php');


	if(user_logged_in()){
		header('location: profile.php');
		die();
	}

	if(isset($_POST['registration'])){

		$email = $_POST['email'];

		$password = $_POST['password'];

		if(!email_exists()){

			if($email == NULL){
				if($password == NULL){
					echo "nothing";
				}
			}else{
				$insert = mysqli_query($connection, "INSERT INTO users (email, password) VALUES('$email', '$password')");
			}

			$erroremail = "you are registered. please <a href='login.php'>log in</a>";
			
		}else {
			$erroremail = "Email Already exists! try any other email";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<form action="" method="POST">
		<input type="email" placeholder="email Address" name="email">
		<input type="password" placeholder="password" name="password">
		<input type="submit" value="Register" name="registration">
	</form>

	already have an account? please <a href="login.php">Log in</a>

	<?php 
		if(isset($erroremail)){
			echo $erroremail;
		}
	?>
	
</body>
</html>