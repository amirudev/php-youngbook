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
                <form action="#" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="address">Example select</label>
                    <select class="form-control" id="provinsi" name="province" onchange="kabupaten()">
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Example select</label>
                    <select class="form-control" id="kota_kabupaten" name="city">
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <script src="/php-youngbook/page/functions/signup_desc.js"></script>
            </div>
        </div>
</body>
</html>