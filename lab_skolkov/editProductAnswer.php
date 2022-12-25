<?php
include_once "./header.php";

$errors = ProductsActions::edit();
if(!empty($errors)){
    foreach($errors as $error){
        echo $error;
    }
}
else header("Location: products.php");

include_once "./footer.php";
?>