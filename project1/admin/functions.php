<?php 

require_once('config.php');

function email_exists(){

	global $connection;
	global $email;

	$query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
	if(mysqli_num_rows($query) == 1){
		return true;
	}
}



function user_logged_in(){
	if(isset($_SESSION['success'])){
		return true;
	}
}