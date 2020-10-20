<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youngbook - <?php echo $_GET['name'] ?></title>
    <link rel="stylesheet" href="/php-youngbook/assets/style/message_chatbox.css">
</head>
<body>
    <?php
    require '/opt/lampp/htdocs/php-youngbook/page/components/header.php';
    require '/opt/lampp/htdocs/php-youngbook/page/functions/mysqliconnect.php';
    require '/opt/lampp/htdocs/php-youngbook/page/functions/message_pickname.php';
    $user = $_SESSION['userlogin'];
    $senderusername = $_GET['username'];
    $sendername = pickname($conn, $_GET['username']);
    ?>
    <div class="container my-2">
        <div class="card">
            <div class="card-header">
                <?php echo $sendername ?>
            </div>
            <div class="card-body" id="chatbox">
            <?php
            $sql = "SELECT * FROM `messages` WHERE ( `username` = '$senderusername' AND `receiver` = '$user' ) OR ( `username` = '$user' AND `receiver` = '$senderusername' )";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    if ($row["receiver"] == $user && $row["username"] == $senderusername){ ?>
                        <div class="alert alert-secondary w-75 float-left" role="alert">
                            <?php echo $row["message"] ?>
                        </div>
                    <?php } else if ($row["receiver"] == $senderusername && $row["username"] == $user){  ?>
                        <div class="alert alert-success w-75 float-right" role="alert">
                            <?php echo $row["message"] ?>
                        </div>
                    <?php }
                }
            }
            ?>
            </div>
        </div>
            <div class="form-group">
                <form action="/php-youngbook/page/functions/message_send.php" method="post">
                    <input type="text" name="receiver" value="<?php echo $senderusername ?>" readonly hidden>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ketik pesan disini ..." name="message">
                        <div class="input-group-prepend">
                            <button type="submit" id="chatbox-send">
                                <div class="input-group-text bg-primary text-white" id="btnGroupAddon">Kirim</div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>