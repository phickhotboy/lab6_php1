<?php

class ProductController
{
    public function create()
{
    require_once('Model\Product.php');
    require_once('Model\Category.php');

    // Lấy tất cả danh mục sản phẩm
    $category_model = new Category();
    $all_category = $category_model->getAll();

    if (isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';

        // Xử lý upload ảnh
        $file_image = $_FILES['image'];
        $image_name = '';
        if (getimagesize($file_image['tmp_name']) !== false) {
            $image_name = time() . $file_image['name'];
            $source_file = $file_image['tmp_name'];
            $target_file = 'assets/images/' . $image_name;
            move_uploaded_file($source_file, $target_file);
        }

        // Lưu sản phẩm
        $product_model = new Product();
        $message = $product_model->store($name, $price, $description, $content, $image_name, $category_id); // Thêm category_id vào đây

        // Chuyển hướng sau khi lưu thành công
        header('Location: index.php?router=admin/product/listing');
        exit; // Đừng quên thêm exit sau header
    }

    // Gọi view để hiển thị form thêm sản phẩm
    include('Views\admin\header.php');
    include('Views\admin\productAdd.php');
    include('Views\admin\footer.php');
}

    public function edit($id)
    {
        require_once('Model\Product.php');
        $product_model = new Product();

        // Lấy sản phẩm theo ID
        $product_array_edit = $product_model->getProductID($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product_array_edit) {
            echo "<script>alert('Sản phẩm không tồn tại.'); window.location.href='index.php?router=admin/product/listing';</script>";
            exit;
        }

        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';

            // Xu lý upload ảnh
            $file_image = $_FILES['image'];
            $image_name = isset($file_image['name']) && $file_image['name'] != '' ? time() . $file_image['name'] : $product_array_edit['image'];

            // Kiểm tra xem tệp hình ảnh có được chọn không
            if (isset($file_image['tmp_name']) && $file_image['tmp_name'] != '') {
                // Ktra file upload có phải hình ảnh không
                if (getimagesize($file_image['tmp_name']) !== false) {
                    $source_file = $file_image['tmp_name'];
                    $target_file = 'assets/images/' . $image_name;
                    move_uploaded_file($source_file, $target_file);
                }
            } else {
                // Giữ lại tên hình ảnh cũ nếu không có hình ảnh mới
                $image_name = $product_array_edit['image'];
            }

            // Cập nhật sản phẩm
            $message = $product_model->update($id, $name, $price, $description, $content, $image_name);
            header('Location: index.php?router=admin/product/listing');
        }

        include('Views/admin/header.php');
        include('Views/admin/productEdit.php');
        include('Views/admin/footer.php');
    }
    public function delete($id)
    {
        require_once('Model\Product.php');
        $product_model = new Product();

        $product_array_delete = $product_model->delete($id);
        header("Location: index.php?router=admin/product/listing");
        exit;

    }

    public function listing()
    {
        require_once('Model\Product.php');
        require_once('Model\Category.php');

        $product_model = new Product();
        $category_model = new Category();

        $ArrProduct = $product_model->getListAllProduct();
        $ArrCategory = $category_model->getAll();

        $categories = [];
        foreach ($ArrCategory as $category) {
            $categories[$category['id']] = $category['name'];
        }

        foreach ($ArrProduct as &$product) {
            $product['category_name'] = $categories[$product['category_id']] ?? 'Khác';
        }

        include('Views/admin/header.php');
        include('Views/admin/productListing.php');
        include('Views/admin/footer.php');
    }
}