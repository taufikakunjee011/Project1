<?php 

	session_start();

	require_once('functions.php');

	if(!user_logged_in()){

		header('location: login.php');
		die();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
</head>
<body>
	
	<a href="index.php">Admin Panel</a>


	<a href="logout.php">Log out</a>
</body>
</html>