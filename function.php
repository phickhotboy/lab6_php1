<?php
function checkLogin(){
    $logged = $_SESSION['logged'] ?? false;
    if($logged != true){
        header("Location: index.php?router=login");
    }
}
?>