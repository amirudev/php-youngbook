<?php
require 'mysqliconnect.php';

$username = $_POST['username'];
$name = $_POST['name'];
$text = $_POST['text'];

$sql = "INSERT INTO `forum_global` (`id`, `username`, `name`, `text`) VALUES (NULL, '$username', '$name', '$text');";

if (mysqli_query($conn, $sql)) {
	$_COOKIE['message'] = "NEW RECORD SAVED SUCCESSFULLY";
} else {
	echo "SOMETHING WENT WRONG, " . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: ../forum/")
?>