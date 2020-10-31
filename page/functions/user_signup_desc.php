<?php
session_start();
if(isset($_SESSION['userlogin'])){
    require 'mysqliconnect.php';
    if(isset($_POST['bio'])){
        $bio = $_POST['bio'];
    }
    if(isset($_POST['kota_kabupaten'])){
        $kota_id = $_POST['kota_kabupaten'];
    }
    $username = $_SESSION['userlogin'];
    
    if(isset($_FILES['profilphoto'])){
        $target_dir = "/opt/lampp/htdocs/php-youngbook/data/image_profile/";
        $target_file_name = $target_dir . $username;
        $imageFileType = $_FILES['profilphoto']['type'];
        
        // Check if image file is a actual image or fake image
        if($imageFileType == 'image/jpeg' || $imageFileType == 'image/png'){
            $target_file_name .= '.jpg';
            $isImageOk = 1;
        } else {
            echo "Sorry, only JPG, JPEG and PNG files are allowed.";
            $isImageOk = 0;
        }
    
        // Check file size
        if ($_FILES["profilphoto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $isImageOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($isImageOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES['profilphoto']['tmp_name'], $target_file_name)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["profilphoto"]["name"])). " has been uploaded.";
            $isImageExist = 1;
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    $sql = "UPDATE `user_data` SET `bio` = '$bio', `location` = '$kota_id', `profile_image` = '$isImageExist' WHERE `username` = '$username'";
    
    if($username){
        if(mysqli_query($conn, $sql)){
            header("Location: /php-youngbook/page/profile/index.php?username=$username");
        } else {
            echo "Failed" . mysqli_error($conn);
        }
    } else {
        echo 'Access Unauthorized';
    }
} else {
    echo 'Access Unauthorized';
}

?>
