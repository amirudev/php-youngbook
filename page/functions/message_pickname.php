<?php
require '/opt/lampp/htdocs/php-youngbook/page/functions/mysqliconnect.php';
function pickname($conn, $username){
    $sql = "SELECT `name` FROM `user` WHERE `username` = '$username'";
    if (mysqli_query($conn, $sql)){
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        return $result["name"];
    } else {
        return 'Something Went wrong';
    }
}
?>