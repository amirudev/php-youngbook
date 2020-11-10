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
    <link rel="stylesheet" href="/php-youngbook/assets/style/marketplace_bacaselengkapnya.css">
    <title>Baca produk selengkapnya</title>
</head>
<body>
    <?php 
    require '../components/header.php';
    require '../functions/mysqliconnect.php';
    require '../functions/marketplace_pickcategoryname.php';
    require '../functions/marketplace_pickname.php';
    require '../functions/marketplace_pickusername.php';

    $product_id = $_GET['id'];
    $sql_product = "SELECT * FROM `items` WHERE `id` = '$product_id'";
    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql_product));
    $category = pickcategoryname($conn, $product['item_category']);
    $seller_name = pickname($conn, $product['seller_id']);
    $product_id = $product['id'];
    $seller_id = $product['seller_id'];
    $seller_username = pick_username($conn, $seller_id);
    ?>
    <div class="header-product bg-light">
        <a href="/php-youngbook/page/marketplace/index.php" class="btn"><-</a>
        <span><?php echo $product['item_name'] ?></span>
    </div>
    <div class="content">
        <div class="product row bg-light m-3">
            <?php if($product['is_image_exist'] == 1){ ?>
                <img src="/php-youngbook/assets/data/marketplace_image/<?php echo $product['image_file'] ?>.jpg" class="col-2 m-3">
            <?php } else { ?>
                <img src="/php-youngbook/data/marketplace_image/default.jpg" class="col-2 m-3">
            <?php } ?>
            <div class="col-9 m-3">
                <h2><?php echo $product['item_name'] ?></h2>
                <!-- Mockup, Will be developed soon -->
                <p>Rating Produk : * * * * *</p>
                <p>Rating Penjual : * * * * ( 80% )( 4/5 pesanan dipenuhi )</p>
            </div>
        </div>
        <div class="description m-3">
            <p>Deskripsi Produk</p>
            <p>Nama Produk : <?php echo $product['item_name']; ?></p>
            <p>Kategori : <?php echo $category; ?></p>
            <p>Penjual : <?php echo $seller_name; ?> </p><br>
            <p>Deskripsi</p>
            <p><?php echo $product['item_description']; ?></p>
        </div>
    </div>
    <div class="control-button">
        <div class="bg-light fixed-bottom p-3">
            <h4 class="mx-3">Rp<?php echo $product['item_price'] ?></h4>
            <div class="row">
                <div class="col-10"><a href="<?php echo "/php-youngbook/page/functions/marketplace_buy.php?id=$product_id&seller=$seller_id" ?>" class="btn btn-success w-100">Beli Sekarang</a></div>
                <div class="col-2"><a href="<?php echo "/php-youngbook/page/message/chatbox.php?username=$seller_username" ?>" class="btn btn-primary"><i class="fas fa-comments fa-1x"></i></a></div>
            </div>
        </div>
        </div>
</body>
</html>