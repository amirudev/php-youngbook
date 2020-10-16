<?php
require 'mysqliconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user_data` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($conn, $sql);

echo $sql;
echo json_encode($result);
$name = mysqli_fetch_assoc($result)['name'];

if(mysqli_num_rows($result) == 1){
	session_start();
    // $_COOKIE['messagecookie'] = 'Selamat datang kembali !';
    setcookie('messagecookie', "Hello, $name. Make your new post", time()+60*60, '/');
    $_SESSION['userlogin'] = $username;
    header('Location: ../forum/');
} else if(mysqli_num_rows($result) == 0){
    setcookie('passwordwrong', 'Proses masuk gagal, Username atau password salah', time()+1, '/');
    header('Location: ../user/signin.php');
} else {
    setcookie('passwordwrong', 'Kesalahan pada server, hubungi admin ( Data ganda pada database )', time()+1, '/');
    header('Location: ../user/signin.php');
} 
?>