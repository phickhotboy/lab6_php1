<div class="container mt-4">
    <h2 class="text-center">Sửa sản phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" value="<?= isset($category_array_edit['name']) ? $category_array_edit['name'] : '' ?>" name="name" id="name" placeholder="Nhập tên sản phẩm ..." required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Sửa sản phẩm</button>
        <a href="index.php?router=admin/product/listing" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
