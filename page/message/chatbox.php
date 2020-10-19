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
    require '/opt/lampp/htdocs/php-youngbook/page/functions/message_pickname.php'
    ?>
    <div class="container my-2">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body" id="chatbox">
            <?php
            $user = $_SESSION['userlogin'];
            $sendername = pickname($conn, $_GET['username']);
            $senderusername = $_GET['username'];
            $sql = "SELECT * FROM `messages` WHERE `username` = '$senderusername' AND `receiver` = '$user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    if ($user == $row["receiver"] && $senderusername == $row["username"]){ ?>
                        <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>
                    <?php } else if ($row["username"] == $user && $row["receiver"] == $senderusername){  ?>
                        <div class="alert alert-danger" role="alert">
                            still not working
                        </div>
                    <?php } else { ?>
                    P
                    <?php }
                }
            }
            ?>
                
            </div>
        </div>
            <div class="form-group">
                <div class="input-group-prepend">
                    <form action="/php-youngbook/page/functions/message_create.php" method="post"></form>
                    <input type="text" class="form-control" placeholder="Ketik pesan disini ...">
                    <button type="submit" id="chatbox-send">
                        <div class="input-group-text bg-primary text-white" id="btnGroupAddon">Kirim</div>
                    </button>
                </div>
            </div>
    </div>
</body>
</html>