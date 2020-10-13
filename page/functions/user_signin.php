<?php
require 'mysqliconnect.php';

$username = $_POST['username'];
$password = $_POST['username'];

$sql = 'SELECT * FROM user_data';
$result = mysqli_query($conn, $sql);

echo $sql;
echo json_encode($result);

if(mysqli_num_rows($result) > 0){
	session_start();
	$_SESSION['messagecookie'] = 'Selamat datang kembali !';
    setcookie('userlogin', $username, time()+60*60*24, '/');
    header('Location: ../forum/');
} else {
    $_SESSION['messagecookie'] = 'Proses masuk gagal, Username atau password salah';
    // header('Location: ../user/signin.php');
}
?>