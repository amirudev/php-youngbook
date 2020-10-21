<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/php-youngbook/assets/style/profile_index.css">
</head>
<body>
    <?php
    require '/opt/lampp/htdocs/php-youngbook/page/components/header.php';
    require '/opt/lampp/htdocs/php-youngbook/page/functions/mysqliconnect.php';
    ?>
    <div class="bg-light">
        <div class="container p-5">
            <div class="card">
                <img src="/php-youngbook/assets/image/profile_jumbotron.jpg" class="card-img-top" alt="Jumbotron" id="jumbotron">
                <div class="card-body">
                    <div class="profile">
                        <div class="row">
                            <div class="col-3">
                                <img src="/php-youngbook/assets/image/profile_default.png" alt="Profile Picture" id="profile">
                            </div>
                            <div class="col-9" id="profile-button">
                                <a href="#" class="btn btn-primary float-right">Kirim Pesan</a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-desc mt-3">
                        <?php
                        $username = $_GET['username'];
                        $sql = "SELECT * FROM `user_data` WHERE `username` = '$username'";
                        $userdata = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                        ?>
                        <h4><strong><?php echo $userdata['name'] ?></strong></h4>
                        <h5><?php echo $userdata['bio'] ?></h5>
                        <h5><?php echo $userdata['location'] ?></h5>
                    </div>
                    <div class="my-4">
                    <?php
                    $sql = "SELECT * FROM `forum_global` WHERE `username` = '$username' ORDER BY `id` DESC LIMIT 10";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)){
                            $userid = $row['id']?>
                            <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo '@'.$row['username'] ?></h6>
                                <p class="card-text"><?php echo $row['text'] ?></p>
                                <?php if(isset($_SESSION['userlogin'])){ if($_SESSION['userlogin'] == $row['username']){ ?>
                                    <a href='<?php echo "/php-youngbook/page/forum/edit.php/?id=$userid" ?>' class="card-link" >Edit</a>
                                    <a href='<?php echo "/php-youngbook/page/functions/forum_delete.php/?id=$userid" ?>' class="card-link">Delete</a>
                                <?php }}?>
                            </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>