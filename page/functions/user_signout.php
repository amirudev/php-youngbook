<?php
session_start();
unset($_SESSION['userlogin']);
session_destroy();
header('Location: ../user/signin.php');
?>