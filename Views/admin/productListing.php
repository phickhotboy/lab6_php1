<div class="container my-5">
        <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
        <div class="table-wrapper">
            <div class="text-end mb-2">
                <a href="index.php?router=admin/product/add"><button class="btn btn-custom">Thêm sản phẩm</button></a>
            </div>
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Mô tả ngắn</th>
                        <th scope="col">Thương hiệu</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    foreach ($ArrProduct as $key => $value) {
                        ?>
                        <tr>
                            <td><?=$stt++?></td>
                            <td><img src="assets/images/<?= $value['image'] ?>" class="product-img" alt=""></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= number_format($value['price'], 0, ',', '.') ?> VND</td>
                            <td><?= $value['description'] ?></td>
                            <td><?= $value['brand'] ?></td>
                            <td>
                                <a href="index.php?router=admin/product/edit&id=<?=$value['id']?>"><button class="btn btn-warning">Sửa</button></a>
                                <a href="#"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    