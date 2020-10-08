<?php
function mysqliconnect()
{
	$servername = '';
	$username = '';
	$password = '';

	// Create Connection
	$conn = new mysqli_connect($servername, $username, $password);

	// Check Connection
	if (!$conn) {
		die("Connection Failed: " . $conn->connect_error);
	} else {
		echo "Connected Succesfully";
	}
}
?>