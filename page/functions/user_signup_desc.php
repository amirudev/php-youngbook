<?php
require 'mysqliconnect.php';
$bio = $_POST['bio'];
$kota_id = $_POST['kota_kabupaten'];
$username = $_SESSION['userlogin'];

$sql = "UPDATE `user_data` SET `bio` = `$bio`, `location` = `$kota_id` WHERE `username` = `$username`";

if(mysqli_query($conn, $sql)){
    header('Location: /php-youngbook/page/profile/index.php');
} else {
    header('Location: /php-youngbook/page/forum/index.php');
}
?>
