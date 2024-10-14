<?php

class CategoryController
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

        // Lưu sản phẩm
        $category_model = new Category();
        $message = $category_model->store($name); // Thêm category_id vào đây

        // Chuyển hướng sau khi lưu thành công
        header('Location: index.php?router=admin/category/listing');
        exit; // Đừng quên thêm exit sau header
    }

    // Gọi view để hiển thị form thêm sản phẩm
    include('Views\admin\header.php');
    include('Views\admin\CategoryAdd.php');
    include('Views\admin\footer.php');
}

    public function edit($id)
    {
        require_once('Model\Category.php');
        $category_model = new Category();

        // Lấy sản phẩm theo ID
        $category_array_edit = $category_model->getProductID($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$category_array_edit) {
            echo "<script>alert('Sản phẩm không tồn tại.'); window.location.href='index.php?router=admin/product/listing';</script>";
            exit;
        }

        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
        
            // Cập nhật danh mục với cả id và name
            $message = $category_model->update($id, $name);
        
            // Chuyển hướng sau khi cập nhật thành công
            header('Location: index.php?router=admin/category/listing');
            exit;
        }

        include('Views/admin/header.php');
        include('Views/admin/CategoryEdit.php');
        include('Views/admin/footer.php');
    }
    public function delete($id)
    {
        require_once('Model\Category.php');
        $category_model = new Category();

        $product_array_delete = $category_model->delete($id);
        header("Location: index.php?router=admin/category/listing");
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
        include('Views/admin/CategoryListing.php');
        include('Views/admin/footer.php');
    }
}