<?php
setcookie('userlogin', '', time()-60*60*24, '/');
header('Location: ../user/signin.php');
?>