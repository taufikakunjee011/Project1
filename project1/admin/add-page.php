<?php 

	session_start();

	require_once('functions.php');

	if(!user_logged_in()) {

		die("ki bepar.. login koren age.. tarpor ashen");
	}

	require_once('config.php');

	if(isset($_POST['createpage'])){

		$pagetitle = isset($_POST['pagetitle']) ? $_POST['pagetitle'] : 'Empty Title';
		$pagecontent = $_POST['pagecontent'];

		$randomnumber = rand(1,100).rand(1,100);

		$url = '?page='.$randomnumber;



		$insert = mysqli_query($connection, "INSERT INTO pages (pagetitle, pagecontent, url, pageid) VALUES('$pagetitle', '$pagecontent', '$url', $randomnumber)");

		if($insert){
			$success = "Page has been created";

			header('location: edit.php'.$url);
		}


	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Page</title>
	<link rel="stylesheet" href="style.css">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 	<script>tinymce.init({ selector:'.tinymce' });</script>
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
			<form action="" method="POST">
				<input type="text" placeholder="Page Title" name="pagetitle">
				<textarea class="tinymce" name="pagecontent" cols="30" rows="10"></textarea>

				<input type="submit" name="createpage" value="Create Page">
			</form>

			<?php if(isset($success)){
				echo $success;
			}?>
		</div>


	</div>


</body>
</html>