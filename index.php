<?php
require_once('Controller/HomeController.php');
require_once('Controller/admin/ProductController.php');
$router = isset($_GET['router']) ? $_GET['router'] : '';
switch ($router) {
    case 'admin/product/add':
        $product_Controller = new ProductController();
        $product_Controller->create();
        break;
    case 'admin/product/edit':
        //Sua san pham\
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $product_Controller = new ProductController();
        $product_Controller->edit($id);
        break;
    case 'admin/product/listing':
        $productListing = new ProductController();
        $productListing->listing();
        break;
    default:
        $product = new HomeController();
        $product->listAllProduct();
        break;
}

?>