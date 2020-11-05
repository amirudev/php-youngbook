<?php
require 'mysqliconnect.php';
require '../components/header.php';
require 'marketplace_deleteusername.php';

$id = $_GET['id'];

$seller_id = getSellerId($conn, $id);
$username = getDeleteUsername($conn, $seller_id);

if($username == $_SESSION['userlogin']){
    $sql = "DELETE FROM `items` WHERE `id` = '$id'";
    if(mysqli_query($conn, $sql)){
        header('Location: /php-youngbook/page/marketplace/index.php');
    }
} else {
    echo 'Action Unauthorized';
}
?>