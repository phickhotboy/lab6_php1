<?php
class HomeController{
    public function listAllProduct(){
        require_once('Model\Product.php');
        $product_model = new Product();
        $ArrProduct = $product_model->getListAllProduct();
        include('Views\list_product.php');
    }
}
?>