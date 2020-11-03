<?php 
require 'mysqliconnect.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `user` (`username`, `name`, `password`) VALUES ('$username', '$name', '$password');";

if(mysqli_query($conn, $sql)) {
	session_start();
	setcookie('messagecookie', 'Congratulations ! Create a new post', time()+60*60, '/');
	setcookie('messagecookiestatus', 'success', time()+60*60, '/');
	$_SESSION['userlogin'] = $username;
	header('Location: /php-youngbook/page/user/signup_desc.php');
} else {
	echo "Failed" . mysqli_error($conn);
}
?>