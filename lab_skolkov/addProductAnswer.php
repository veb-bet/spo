<?php
include_once "./header.php";

ProductsActions::add();
header("Location: products.php");

include_once "./footer.php";
?>