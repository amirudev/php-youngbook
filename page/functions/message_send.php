<?php
require 'mysqliconnect.php';
session_start();

$username = $_SESSION['userlogin'];
echo $username;
$message = htmlspecialchars($_POST["message"]);
$receiver = $_POST["receiver"];
$sql = "INSERT INTO `messages` (`id`, `username`, `message`, `timestamp`, `receiver`) VALUES (NULL, '$username', '$message', NULL, '$receiver')";

if (mysqli_query($conn, $sql)){
    mysqli_close($conn);
    header("Location: ../message/chatbox.php?username=$receiver");
} else {
    echo "Something went wrong, " . mysqli_error($conn);
}
?>