<div class="container mt-4">
    <h2 class="text-center">Thêm sản phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm ...">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm ...">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sản phẩm</label>
            <textarea class="form-control" name="description" id="description" rows="3"
                placeholder="Nhập mô tả sản phẩm ..."></textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung sản phẩm</label>
            <textarea class="form-control" name="content" id="content" rows="3"
                placeholder="Nhập nội dung sản phẩm ..."></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Hãng sản phẩm</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Nhập tên hãng sản phẩm ...">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Thêm sản phẩm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>