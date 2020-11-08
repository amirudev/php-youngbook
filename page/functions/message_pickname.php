<?php
function pickname($conn, $username){
    $sql = "SELECT `name` FROM `users` WHERE `username` = '$username'";
    return $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
}
?>