<div class="container my-5">
    <div class="table-wrapper">
        <div class="text-end mb-2">
            <?php
            if (isset($_SESSION['logged']) && $_SESSION['logged']) {
                echo '<div class="d-flex justify-content-between align-items-center mb-4">';
                echo '<span>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                echo '<a href="index.php" class="btn btn-success">Logout</a>';
                echo '</div>';
            }
            ?>
        </div>
        <h1 class="text-center mb-4">Danh sách danh mục</h1>
        <div class="text-end mb-2">
            <a href="index.php?router=admin/category/add"><button class="btn btn-custom">Thêm danh mục</button></a>
        </div>
        <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($ArrCategory as $key => $value) {
                    ?>
                    <tr>
                        <td><?= $stt++ ?></td>
                        <td><?= $value['name'] ?></td>
                        <td>
                            <a href="index.php?router=admin/category/edit&id=<?= $value['id'] ?>"><button
                                    class="btn btn-warning">Sửa</button></a>
                            <a href="index.php?router=admin/category/delete&id=<?= $value['id'] ?>"><button
                                    class="btn btn-danger">Xóa</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php?router=admin/product/listing"><button class="btn btn-success">Quản lý danh mục</button></a>
    </div>