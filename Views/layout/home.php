<div class="container">

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