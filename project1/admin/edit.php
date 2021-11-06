<?php 

	session_start();
	require_once('config.php');	
	require_once('functions.php');

	if(!user_logged_in()) {

		die("ki bepar.. login koren age.. tarpor ashen");
	}

	if(isset($_POST['updatepage'])){

		$pagetitle = isset($_POST['pagetitle']) ? $_POST['pagetitle'] : 'Empty Title';
		$pagecontent = $_POST['pagecontent'];

		
		$page = isset($_GET['page']) ? $_GET['page'] : '';


		$insert = mysqli_query($connection, "UPDATE pages SET pagetitle = '$pagetitle', pagecontent = '$pagecontent' WHERE pageid = '$page'");

		if($insert){
			$success = "Page has been updated";
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
			<?php 

				$page = isset($_GET['page']) ? $_GET['page'] : '';

				$query = mysqli_query($connection, "SELECT * FROM pages WHERE pageid = '$page'");

				$info = mysqli_fetch_assoc($query);

			?>
			<form action="" method="POST">
				<input type="text" placeholder="Page Title" name="pagetitle" value="<?php echo $info['pagetitle']; ?>">
				<textarea class="tinymce" name="pagecontent" cols="30" rows="10">
					<?php echo $info['pagecontent']; ?>
				</textarea>

				<input type="submit" name="updatepage" value="Update Page">
			</form>


			<?php if(isset($success)){
				echo $success;
			}?>
		</div>


	</div>


</body>
</html>