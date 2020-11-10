<?php
    require 'mysqliconnect.php';
    $id = $_POST['id'];
    $text = $_POST['text'];
    $sql = "UPDATE `posts` SET `text`='$text' WHERE `id`='$id'";
    if(mysqli_query($conn, $sql)){
        header('Location: ..\forum\index.php');
    }
?>