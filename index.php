<?php
session_start();
require_once('Controller/HomeController.php');
require_once('Controller/LoginController.php');
require_once('Controller/admin/ProductController.php');
require_once('Controller/admin/CategoryController.php');
require_once('Model/Category.php');

include('function.php');
$router = isset($_GET['router']) ? $_GET['router'] : '';

switch ($router) {
    case 'admin/category/listing':
        checkLogin();
        $categoryListing = new CategoryController();
        $categoryListing->listing();
        break;
    case 'admin/category/add':
        $catgory_Controller = new CategoryController();
        $catgory_Controller->create();
        break;
    case 'admin/category/edit':
        checkLogin();
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $catgory_Controller = new CategoryController();
        $catgory_Controller->edit($id);
        break;
    case 'admin/category/delete':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $catgory_Controller = new CategoryController();
        $catgory_Controller->delete($id);
        break;
    case 'admin/product/add':
        checkLogin();
        $product_Controller = new ProductController();
        $product_Controller->create();
        break;
    case 'admin/product/edit':
        checkLogin();
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $product_Controller = new ProductController();
        $product_Controller->edit($id);
        break;
    case 'admin/product/listing':
        checkLogin();
        $productListing = new ProductController();
        $productListing->listing();
        break;
    case 'admin/product/delete':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $product_Controller = new ProductController();
        $product_Controller->delete($id);
        break;
    case 'login':
        $login = new LoginController();
        $login->index();
        break;
    case 'logout':
        $login = new LoginController();
        $login->logout();
        break;
    case 'register':
        $register = new LoginController();
        $register->register();
        break;
    default:
        $product = new HomeController();
        $product->listAllProduct();
        break;
}

?>