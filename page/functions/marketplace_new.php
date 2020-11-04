<?php
require 'mysqliconnect.php';
require 'marketplace_pickid.php';
session_start();

$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];
echo $seller_id = pick_id($conn); // ERROR

$sql = "INSERT `items` (`id`, `seller_id`, `item_name`, `item_description`, `item_price`, `item_category`) VALUES (NULL, '$seller_id', '$name', '$description', '$price', '$category')";

if (mysqli_query($conn, $sql)){
    header('Location: /php-youngbook/page/marketplace/index.php');
} else {
    echo 'Something went wrong' . mysqli_error($conn);;
}
?>