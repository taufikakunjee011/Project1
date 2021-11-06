<?php 

	session_start();
	require_once('config.php');
		require_once('functions.php');

	if(!user_logged_in()) {

		die("ki bepar.. login koren age.. tarpor ashen");
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
			<h2>Pages: </h2>

			<ul>
				<?php 

				$query = mysqli_query($connection, "SELECT * FROM pages");

				while($row = mysqli_fetch_assoc($query)) :

				?>

					<li><a href="edit.php<?php echo $row['url']; ?>"><?php echo $row['pagetitle']; ?></a></li>

				<?php endwhile; ?>
			</ul>


		</div>


	</div>


</body>
</html>