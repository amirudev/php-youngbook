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
$sql = "SELECT * FROM `posts` WHERE `id` = $userid";
$result = mysqli_query($conn, $sql);
$text = mysqli_fetch_assoc($result);
?>
<form action="..\..\functions\forum_edit.php" method="post">
    <div class="container">
        <div class="card bg-light mb-3 my-3">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <h5 class="card-title">Wahyu Amirulloh</h5>
                <h6 class="card-title">@wahyuamirulloh</h5>
                <div class="form-group">
                    <input type="text" name="id" value="<?php echo $text['id'] ?>" hidden>
                    <label for="exampleFormControlTextarea1">Tulis Postingan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"><?php echo $text['text']; ?></textarea>
                    <button type="submit" class="btn btn-primary my-2">Edit Postingan</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>