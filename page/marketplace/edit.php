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
    <title>Perbarui data produk</title>
</head>
<body>
    <?php 
    require '../components/header.php';
    require '../functions/mysqliconnect.php';
    require '../functions/marketplace_pickcategoryname.php';
    $id = $_GET['id'];
    $seller = $_SESSION['userlogin'];

    function getData($conn, $id){
        $sql = "SELECT * FROM `items` WHERE `id` = '$id'";
        return mysqli_fetch_assoc(mysqli_query($conn, $sql));
    }

    $product = getData($conn, $id);
    ?>
    <div class="container">
        <div class="m-2">
            <h2>Update Your Products...</h2>
            <form action="/php-youngbook/page/functions/marketplace_edit.php" method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo $product['id'] ?>" hidden>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Produk dan Foto Produk</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nama Produk" value="<?php echo $product['item_name'] ?>">
                        <div class="photo-upload input-group-text"><input type="file" name="product_photo">Upload Gambar Produk</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category" value="<?php echo $product['category'] ?>">
                    <option value="<?php echo $product['item_category'] ?>"><?php echo pickcategoryname($conn, $product['item_category']) ?></option>
                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="<?php echo $product['item_price'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Edit This Product</button>
                    <a href="<?php echo "/php-youngbook/page/functions/marketplace_delete.php?id=$id" ?>" class="btn btn-danger">Delete This Product</a>
                </div>
                </form>
        </div>
    </div>
</body>
</html>