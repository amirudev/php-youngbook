<?php 
function pick_id($conn){
    $seller = $_SESSION['userlogin'];
    $sql = "SELECT `id` FROM `users` WHERE `name` = '$seller'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['id']; // ERPOR
}
?>