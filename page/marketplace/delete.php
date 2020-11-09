<!-- 
	Author : Wahyu Amirulloh
	Name : PHP-Youngbook
	Year : 2020
	Github : github.com/wahyuamirulloh
 -->
<?php
require 'mysqliconnect.php';
$id = $_GET['id'];
function getSeller($conn){
    $sql = "SELECT `username` FROM `items` WHERE `id` = '$id'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['username'];
}
$username = getSeller($conn);

if($username == $_SESSION['userlogin']){
    $sql = "DELETE FROM `users` WHERE `id` = '$id'";
    if(mysqli_query($conn. $sql)){
        header('Location: ../marketplace/index.php');
    }
}
?>