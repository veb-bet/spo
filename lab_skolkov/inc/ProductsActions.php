<?php
class ProductsActions{

    public static function add()
    {
        return ProductsLogic::add($_POST["name"], $_POST["description"], $_POST["material_id"], $_FILES["image"], $_POST["price"]);
    }

    public static function edit(): array
    {
        return ProductsLogic::edit($_POST["id"], $_POST["name"], $_POST["description"], $_POST["material_id"], $_FILES["image"], $_POST["price"]);
        
    }

    public static function delete()
    {
        return ProductsLogic::delete($_POST["id"]);
    }

    public static function getAll(): array
    {
        return ProductsLogic::getAll();
    }

    public static function getById(): array
    {
        return ProductsLogic::getById($_POST["id"??-1]);;
    }

    public static function getByFilter(): array
    {
        return ProductsLogic::getByFilter($_GET["name"]??"", $_GET["description"]??"", $_GET["material_id"]??"", $_GET["min_price"]??0, $_GET["max_price"]??100000);
    }

    public static function getMaterials(): array
    {
        return ProductsLogic::getMaterials();
    }
}

?>