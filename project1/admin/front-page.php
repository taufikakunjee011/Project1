<?php 
	
	session_start();

	require_once('functions.php');

	if(!user_logged_in()) {

		header('location: login.php');
		die();
	}


	if(isset($_POST['assignpage'])){

		$selected = $_POST['front-page'];

		$query = mysqli_query($connection, "UPDATE pages SET url = 'index.php?page=1', pageid = '1' WHERE pagetitle = '$selected'");

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
			<h2>Which page you need to make your Front page</h2>

			<form action="" method="POST">
				<select name="front-page">

					<?php 

						$query = mysqli_query($connection, "SELECT * FROM pages");

						

						while( $page = mysqli_fetch_assoc($query) ) :

					?>

					<option value="<?php echo $page['pagetitle']; ?>"><?php echo $page['pagetitle']; ?></option>

					<?php endwhile; ?>
				</select>

				<input type="submit" value="assign" name="assignpage">

			</form>
		</div>


	</div>


</body>
</html>