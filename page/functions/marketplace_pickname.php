<?php
function pickname($conn, $id){
    $sql = "SELECT `name` FROM `users` WHERE `id` = '$id'";
    return $result = mysqli_fetch_assoc(mysqli_query($conn, $sql))['name'];
}
?>