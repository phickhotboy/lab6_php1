<?php

class ProductController
{
    public function create()
    {
        require_once('Model\Product.php');
        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
            $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
            //Xu ly upload anh
            $file_image = $_FILES['image'];
            $image_name = '';
            //Ktra file upload co phai hinh anh khong
            if(getimagesize($file_image['tmp_name']) !== false){
                $image_name = time().$file_image['name'];
                $source_file = $file_image['tmp_name'];
                $target_file = 'assets/images/'.$image_name;
                move_uploaded_file($source_file, $target_file);
            }

            
            $product_model = new Product();
            $message = $product_model->store($name, $price, $description, $content, $image_name, $brand);
            header('Location: index.php?router=admin/product/listing');
        }
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
        //Thông báo
        echo "<script>alert('Sản phẩm không tồn tại.'); window.location.href='index.php';</script>";
        exit; 
    }

    if (isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        
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
        $message = $product_model->update($id, $name, $price, $description, $content, $image_name, $brand);
        header('Location: index.php?router=admin/product/listing');
    }

    include('Views/admin/header.php');
    include('Views/admin/productEdit.php');
    include('Views/admin/footer.php');
}


    public function listing()
    {
        require_once('Model\Product.php');
        $product_model = new Product();
        $ArrProduct = $product_model->getListAllProduct();
        include('Views\admin\header.php');
        include('Views\admin\productListing.php');
        include('Views\admin\footer.php');
    }
}