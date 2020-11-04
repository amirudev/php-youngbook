<?php
function pickcategoryname($conn, $id){
    $sql = "SELECT `name` FROM `categories` WHERE `id` = '$id'";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))['name'];
}
?>