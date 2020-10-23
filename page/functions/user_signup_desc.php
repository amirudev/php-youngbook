<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'mysqliconnect.php';
    echo $bio = $_POST['bio'];
    echo $provinsi_id = $_POST['provinsi'];
    echo $kota_id = $_POST['kota_kabupaten'];
    ?>
    <script src="/php-youngbook/page/functions/user_signup_pickname.js"></script>
    <!-- ERROR : Uncaught SyntaxError: Cannot use import statement outside a module -->
</body>
</html>
