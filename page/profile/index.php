<!-- 
	Author : Wahyu Amirulloh
	Name : PHP-Youngbook
	Year : 2020
	Github : github.com/wahyuamirulloh
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna Youngbook</title>
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
            <?php
            $username = $_GET['username'];
            $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
            $userdata = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            ?>
                <img src="/php-youngbook/assets/image/profile_jumbotron.jpg" class="card-img-top" alt="Jumbotron" id="jumbotron">
                <div class="card-body">
                    <div class="profile">
                        <div class="row">
                            <div class="col-3">
                            <?php if(isset($_SESSION['userlogin'])){ if($_SESSION['userlogin'] == $username){ ?><a href="/php-youngbook/page/user/signup_desc.php"> <?php } } else { ?> </a> <?php } ?>
                                <?php if ($userdata['profile_image'] == 1){ ?>
                                    <div id="profile-image">
                                        <img src="/php-youngbook/data/image_profile/<?php echo $username ?>.jpg" alt="Profile Picture" id="profile">
                                        <i class="fas fa-pencil-alt fa-3x"></i>
                                    </div>
                                <?php } else { ?>
                                    <div id="profile-image">
                                        <img src="/php-youngbook/data/image_profile/profile_default.jpg" alt="Profile Picture" id="profile">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                <?php } ?>
                                </a>
                            </div>
                            <div class="col-9" id="profile-button">
                                <?php
                                if(isset($_SESSION['userlogin'])){
                                    if($username == $_SESSION['userlogin']){ ?>
                                        <div class="float-right">
                                            <a href="/php-youngbook/page/user/signup_desc.php" class="btn btn-primary">Edit Informasi</a>
                                            <p>
                                                <?php
                                                $sqlfriends = "SELECT `friends` FROM `users` WHERE `username` = '$username'";
                                                $resultfriends = mysqli_query($conn, $sqlfriends);
                                                if($resultfriends){
                                                    $countfriend = count(explode(", ", mysqli_fetch_assoc($resultfriends)['friends']));
                                                    echo $countfriend . ' Friends';
                                                } else {
                                                    echo 'No Result';
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    <?php } else { ?>
                                        <a href="/php-youngbook/page/message/chatbox.php?username=<?php echo $username ?>" class="btn btn-success float-right">Kirim Pesan</a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a href="/php-youngbook/page/user/signin.php" class="btn btn-warning float-right">Login untuk dapat terhubung</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-desc">
                        <?php if(isset($userdata['name'])){ ?><h4><strong><?php echo $userdata['name'] ?></strong></h4><?php } ?>
                        <?php if(isset($userdata['bio'])){ ?><h5><i class="far fa-sticky-note"></i><?php echo ' ' . $userdata['bio'] ?></h5><?php } ?>
                        <?php if(isset($userdata['location'])){ ?><h5 id="location_id"><?php echo $userdata['location'] ?></h5><?php } ?>
                    </div>
                    <div class="my-4">
                    <?php
                    $sql = "SELECT * FROM `posts` WHERE `username` = '$username' ORDER BY `id` DESC LIMIT 10";
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
    <script src="/php-youngbook/page/functions/profile_picklocation.js"></script>
    <script>location_pickname();</script>
</body>
</html>