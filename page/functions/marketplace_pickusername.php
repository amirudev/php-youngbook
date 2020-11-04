<?php 
function pick_username($conn, $seller_id){
    $seller = $_SESSION['userlogin'];
    $sql = "SELECT `username` FROM `users` WHERE `id` = '$seller_id'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['username'];
}
?>