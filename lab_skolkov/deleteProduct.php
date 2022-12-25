<?php
include_once "./header.php";

ProductsActions::delete();
header("Location: products.php");

include_once "./footer.php";
?>