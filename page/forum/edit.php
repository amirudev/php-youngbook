<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
<?php 
require '../components/header.php';
require '../functions/mysqliconnect.php';
$userid = $_GET['id'];
$sql = "SELECT `text` FROM `forum_global` WHERE `id` = $userid";
$result = mysqli_query($conn, $sql);
$text = mysqli_fetch_assoc($result)['text'];
?>
<div class="container">
    <div class="card bg-light mb-3 my-3">
        <div class="card-header">Edit</div>
        <div class="card-body">
            <h5 class="card-title">Wahyu Amirulloh</h5>
            <h6 class="card-title">@wahyuamirulloh</h5>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Tulis Postingan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $text; ?></textarea>
                <a href="#" class="btn btn-primary my-2">Edit Postingan</a>
            </div>
        </div>
    </div>
</div>
<?php echo $_SERVER['PHP_SELF'] ?>
</body>
</html>