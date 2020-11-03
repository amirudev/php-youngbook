<?php
require 'mysqliconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $account = mysqli_fetch_assoc($result);
    $account_name = $account['name'];
	session_start();
    // $_COOKIE['messagecookie'] = 'Selamat datang kembali !';
    setcookie('messagecookie', "Hello, $account_name. Make your new post", time()+60*60, '/');
    setcookie('messagecookiestatus', "success", time()+60*60, '/');
    $_SESSION['userlogin'] = $username;
    if($account['bio'] == NULL OR $account['location'] == NULL){
        header('Location: /php-youngbook/page/user/signup_desc.php');
    } else {
        header('Location: ../forum/');
    }
} else if(mysqli_num_rows($result) == 0){
    setcookie('passwordwrong', 'Proses masuk gagal, Username atau password salah', time()+1, '/');
    header('Location: ../user/signin.php');
} else {
    setcookie('passwordwrong', 'Kesalahan pada server, hubungi admin ( Data ganda pada database )', time()+1, '/');
    header('Location: ../user/signin.php');
} 
?>