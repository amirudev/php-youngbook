<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/php-youngbook/assets/style/marketplace_form.css">
</head>
<body>
    <?php require '../components/header.php'; ?>
    <?php require '../functions/mysqliconnect.php' ?>
    <div class="container">
        <div class="m-2">
            <h2>Sell things here.</h2>
            <form action="/php-youngbook/page/functions/marketplace_new.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Produk dan Foto Produk</label>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nama Produk">
                        <div class="photo-upload input-group-text"><input type="file" name="product_photo">Upload Gambar Produk</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
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
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Add New Product</button>
                </div>
                </form>
        </div>
    </div>
</body>
</html>