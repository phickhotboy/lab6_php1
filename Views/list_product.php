<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="text-end mb-2">
            <a href="index.php?router=login"><button class="btn btn-primary">Login</button></a>
        </div>
        <h1 class="text-center">Trang sản phẩm</h1>

        <div class="row">
            <?php
            foreach ($ArrProduct as $index => $row) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <img src="assets/images/<?= $row['image'] ?>" alt="" class="product-image">
                        <h3 class="product-name"><?= $row['name'] ?></h3>
                        <p class="product-description"><?= $row['description'] ?></p>
                        <button class="btn btn-warning">Mua</button>

                    </div>
                </div>
                <?php
                if (($index + 1) % 3 == 0 && $index + 1 < count($ArrProduct)) {
                    echo '</div><div class="row">';
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>


</html>