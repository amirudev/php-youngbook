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
    <title>Youngbook - <?php echo $_GET['username'] ?></title>
    <link rel="stylesheet" href="/php-youngbook/assets/style/message_chatbox.css">
</head>
<body>
    <?php
    require '../components/header.php';
    require '../functions/mysqliconnect.php';
    require '../functions/message_pickname.php';
    if(isset($_SESSION['userlogin'])){
    $user = $_SESSION['userlogin'];
    $senderusername = $_GET['username'];
    $sendername = pickname($conn, $senderusername);
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
                            <?php if(substr($row['message'], 0, 10) == "product_id"){
                                $id_produk = substr($row['message'], 11, (strlen($row['message']) - 11));
                                $sql_item = "SELECT * FROM `items` WHERE `id` = '$id_produk'";
                                $result_item = mysqli_fetch_assoc(mysqli_query($conn, $sql_item));
                                ?>
                                <div class="row" id="item_share">
                                    <div class="col-2">
                                        <?php if($result_item['is_image_exist'] == 1){ ?>
                                            <img src="/php-youngbook/data/marketplace_image/<?php echo $result_item['image_file'] ?>.jpg" id="image_item_share">
                                        <?php } else { ?>
                                            <img src="/php-youngbook/data/marketplace_image/default.jpg" class="image_item_share">
                                        <?php } ?>
                                    </div>
                                    <div class="col-10">
                                        <p><?php echo $result_item['item_name'] ?></p>
                                        <p><?php echo $result_item['item_price'] ?></p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                echo $row["message"];
                            } ?>
                        </div>
                    <?php } else if ($row["receiver"] == $senderusername && $row["username"] == $user){  ?>
                        <div class="alert alert-success w-75 float-right" role="alert">
                        <?php if(substr($row['message'], 0, 10) == "product_id"){
                                $id_produk = substr($row['message'], 11, (strlen($row['message']) - 11));
                                $sql_item = "SELECT * FROM `items` WHERE `id` = '$id_produk'";
                                $result_item = mysqli_fetch_assoc(mysqli_query($conn, $sql_item));
                                ?>
                                <div class="row" id="item_share">
                                    <div class="col-2">
                                        <?php if($result_item['is_image_exist'] == 1){ ?>
                                            <img src="/php-youngbook/data/marketplace_image/<?php echo $result_item['image_file'] ?>.jpg" id="image_item_share">
                                        <?php } else { ?>
                                            <img src="/php-youngbook/data/marketplace_image/default.jpg" class="image_item_share">
                                        <?php } ?>
                                    </div>
                                    <div class="col-10">
                                        <p><?php echo $result_item['item_name'] ?></p>
                                        <p><?php echo $result_item['item_price'] ?></p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                echo $row["message"];
                            } ?>
                        </div>
                    <?php }
                }
            }
            ?>
            </div>
        </div>
            <div class="form-group">
                <form action="../functions/message_send.php" method="post">
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
        
    <?php } ?>
	<?php require '../components/footer.php'; ?>
</body>
</html>