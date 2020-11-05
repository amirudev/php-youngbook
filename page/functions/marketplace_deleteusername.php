<?php
function getSellerId($conn, $item_id){
    $sql = "SELECT `seller_id` FROM `items` WHERE `id` = '$item_id'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['seller_id'];
}
function getDeleteUsername($conn, $seller_id){
    $sql = "SELECT `username` FROM `users` WHERE `id` = '$seller_id'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['username'];
}
?>