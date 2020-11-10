<?php
session_start();
require 'mysqliconnect.php';
require 'marketplace_pickusername.php';
require 'marketplace_pickid.php';

$product_id = $_GET['id'];
$seller_id = $_GET['seller'];
$buyer_id = pick_id($conn);
$buyer = pick_username($conn, $buyer_id);
$seller = pick_username($conn, $seller_id);

$sql_transaction = "INSERT INTO `transactions` (`id`, `buyer_id`, `seller_id`, `item_id`) VALUES (NULL, '$buyer_id', '$seller_id', '$product_id')";
$sql_message = "INSERT INTO `messages` (`id`, `username`, `message`, `receiver`) VALUES (NULL, '$buyer', 'product_id?$product_id', '$seller')";
$sql_message_2 = "INSERT INTO `messages` (`id`, `username`, `message`, `receiver`) VALUES (NULL, '$buyer', 'Aku mau beli yang ini', '$seller')";

if(mysqli_query($conn, $sql_transaction)){
    mysqli_query($conn, $sql_message);
    mysqli_query($conn, $sql_message_2);
    header("Location: /php-youngbook/page/message/chatbox.php?username=$seller");
} else {
    echo mysqli_error($conn);
}

?>