<div class="container mt-4">
    <h2 class="text-center">Sửa sản phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" value="<?= isset($product_array_edit['name']) ? $product_array_edit['name'] : '' ?>" name="name" id="name" placeholder="Nhập tên sản phẩm ..." required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" value="<?= isset($product_array_edit['price']) ? $product_array_edit['price'] : '' ?>" name="price" id="price" placeholder="Nhập giá sản phẩm ..." required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sản phẩm</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Nhập mô tả sản phẩm ..." required><?= isset($product_array_edit['description']) ? $product_array_edit['description'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung sản phẩm</label>
            <textarea class="form-control" name="content" id="content" rows="3" placeholder="Nhập nội dung sản phẩm ..." required><?= isset($product_array_edit['content']) ? $product_array_edit['content'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh sản phẩm hiện tại</label>
            <div>
                <img src="assets/images/<?= isset($product_array_edit['image']) ? $product_array_edit['image'] : 'default.jpg' ?>" width="100px" alt="Hình ảnh sản phẩm">
            </div>
            <label for="image" class="form-label">Chọn hình ảnh mới</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Sửa sản phẩm</button>
        <a href="index.php?router=admin/product/listing" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
