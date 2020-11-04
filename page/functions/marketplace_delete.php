<?php
require 'mysqliconnect.php';
require '../components/header.php';
require 'marketplace_pickusername.php';

$id = $_GET['id'];

$username = pick_username($conn, $id);

if($username == $_SESSION['userlogin']){
    $sql = "DELETE FROM `items` WHERE `id` = '$id'";
    if(mysqli_query($conn, $sql)){
        header('Location: /php-youngbook/page/marketplace/index.php');
    }
} else {
    echo 'Action Unauthorized';
}
?>