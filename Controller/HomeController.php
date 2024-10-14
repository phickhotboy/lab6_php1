<?php
class HomeController
{
    public function listAllProduct()
    {
        require_once('Model\Product.php');
        require_once('Model\Category.php');

        $category_model = new Category();
        $all_category = $category_model->getAll();

        $product_model = new Product();
        $ArrProduct = $product_model->getListAllProduct();
        include('Views\layout\header.php');
        include('Views\layout\home.php');
        include('Views\layout\footer.php');
    }
}
?>