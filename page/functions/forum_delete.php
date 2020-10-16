<?php 
    $id = $_GET['id'];

    require 'mysqliconnect.php';
    $sql = "DELETE FROM `forum_global` WHERE `id` = '$id'";

    if(mysqli_query($conn, $sql)){
        echo "SUCCESS";
    } else {
        echo "SWW ". mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Location: ../../forum/');

    echo $sql;
?>