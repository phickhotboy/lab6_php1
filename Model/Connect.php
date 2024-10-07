<?php

$host = 'localhost';
$db_name = 'web2';
$db_user = 'root';
$db_pass = '';
$base_image = 'images/';
try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
    // echo 'Kết nối thành công';
}catch(Exception $e ){
    echo "Kết nối thất bại: " . $e->getMessage();
}