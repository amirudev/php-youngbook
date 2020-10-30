<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/php-youngbook/assets/style/signup_desc.css">
</head>
<body>
<?php require '../components/header.php'; ?>
        <div class="row">
            <div class="col-6" id="text-intro">
                <h3>Introduce Yourself.</h3>
                <h3>Let people knows who you are</h3>
            </div>
            <div class="col-6 bg-light">
                <form action="/php-youngbook/page/functions/user_signup_desc.php" method="POST" class="mx-auto" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profilphoto">Foto Profil</label>
                    <input class="form-control" id="profilphoto" name="profilphoto" type="file"></input>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
                </div>
                <div class="form-provinsi">
                    <label for="provinsi">Provinsi</label>
                    <select class="form-control" id="provinsi" name="provinsi" onchange="kabupaten()">
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota_kabupaten">Kota atau kabupaten</label>
                    <select class="form-control" id="kota_kabupaten" name="kota_kabupaten">
                    </select>
                </div>
                <a href="/php-youngbook/page/profile/index.php?username=<?php echo $_SESSION['userlogin'] ?>" class="btn btn-warning">Nanti Saja</a>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <script src="/php-youngbook/page/functions/signup_desc.js"></script>
            </div>
        </div>
</body>
</html>