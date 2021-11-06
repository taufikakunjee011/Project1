<?php 
	
	session_start();

	require_once('functions.php');

	if(!user_logged_in()) {

		header('location: login.php');
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	

	<div class="container">
		
		<div class="left-sidebar">
			<div class="admin-pages">
				<ul>
					<li><a href="add-page.php">Add New Page</a></li>
					<li><a href="pages.php">All Pages</a></li>
					<li><a href="front-page.php">Assign Front Page</a></li>
				</ul>
			</div>
		</div>
		<div class="main-content">
			<h2>Welcome to Admin Panel</h2>

			<p><a href="logout.php">logout</a></p>
		</div>


	</div>


</body>
</html>