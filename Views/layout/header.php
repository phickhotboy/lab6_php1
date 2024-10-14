<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="assets\styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <img src="https://phuongnamvina.com/img_data/images/mau-logo-nha-sach.jpg" alt="" srcset=""
                        width="100px">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <?php
                foreach ($all_category as $cat) {
                    ?>
                    <a class="nav-item nav-link" href="#"><?= $cat['name'] ?></a>
                <?php }
                ?>
                <li class="nav-item ms-auto">
                    <div class="text-end mb-2">
                        <a href="index.php?router=login"><button class="btn btn-primary">Login</button></a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>