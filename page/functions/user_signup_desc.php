<?php
require 'mysqliconnect.php';
session_start();
$bio = $_POST['bio'];
$kota_id = $_POST['kota_kabupaten'];
$username = $_SESSION['userlogin'];

$sql = "UPDATE `user_data` SET `bio` = '$bio', `location` = '$kota_id' WHERE `username` = '$username'";

if(strlen($kota_id) == 4 AND isset($bio)){
    if(mysqli_query($conn, $sql)){
        header('Location: /php-youngbook/page/profile/index.php');
    } else {
        echo "Failed" . mysqli_error($conn);
    }
} else {
    header('Location: /php-youngbook/page/user/signup_desc.php');
}

?>
