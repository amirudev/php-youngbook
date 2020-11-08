<?php
require 'mysqliconnect.php';
require 'marketplace_pickid.php';

session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];
$seller_id = pick_id($conn);

if($_FILES['product_photo']['size'] == 0 && $_FILES['product_photo']['error'] == 4){
    $isImageExist = 0;
    $randNumber = 0;
} else {
    $target_dir = "/opt/lampp/htdocs/php-youngbook/data/marketplace_image/";
    $randNumber = rand(1000, 9999);
    $target_file_name = $target_dir . $randNumber;
    $imageFileType = $_FILES['product_photo']['type'];
    
    // Check if image file is a actual image or fake image
    if($imageFileType == 'image/jpeg' || $imageFileType == 'image/png'){
        $target_file_name .= '.jpg';
        $isImageOk = 1;
    } else {
        echo "Sorry, only JPG, JPEG and PNG files are allowed.";
        $isImageOk = 0;
    }

    // Check file size
    if ($_FILES["product_photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $isImageOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($isImageOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $isImageExist = 0;
        $randNumber = 0;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['product_photo']['tmp_name'], $target_file_name)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["product_photo"]["name"])). " has been uploaded.";
        $isImageExist = 1;
        $image_file = $randNumber;
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
}
print_r($_FILES['product_photo']);

$sql = "UPDATE `items` SET `seller_id`='$seller_id',`item_name`='$name',`item_description`='$description',`item_price`='$price',`item_category`='$category',`is_image_exist`='$isImageExist',`image_file`='$image_file' WHERE `id` = '$id'";

if (mysqli_query($conn, $sql)){
    header('Location: /php-youngbook/page/marketplace/index.php');
} else {
    echo 'Something went wrong' . mysqli_error($conn);;
}
?>
?>