<?php
require 'mysqliconnect.php';
session_start();

if(isset($_SESSION['userlogin'])){
	$username = $_POST['username'];
	$text = $_POST['text'];

function findName($username, $conn){
	$sql = "SELECT `name` FROM `user_data` WHERE username='$username';";
	json_encode($result = mysqli_query($conn, $sql));
	$result = (mysqli_fetch_assoc($result));
	return $result['name'];
}

$name = findName($username, $conn);

$sql = "INSERT INTO `forum_global` (`id`, `username`, `name`, `text`) VALUES (NULL, '$username', '$name', '$text');";

if (mysqli_query($conn, $sql)) {
	$_COOKIE['message'] = "NEW RECORD SAVED SUCCESSFULLY";
} else {
	echo "SOMETHING WENT WRONG, " . mysqli_error($conn);
}

echo $sql;

mysqli_close($conn);} else {$_COOKIE['message'] = "SERVER REJECTED POST";}

header("Location: ../forum/");
?>