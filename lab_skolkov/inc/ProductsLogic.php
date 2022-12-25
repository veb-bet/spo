<?php
class ProductsLogic{

    public static function add(string $name, string $description, int $material_id, $image, int $price)
    { 
        $errors = [];
        if(empty($name) || empty($description) || empty($material_id) || empty($image) || empty($price)){
            array_push($errors, "Переданы пустые поля");
        }
        $uploaddir = './uploads/';
        $uploadfile = $uploaddir . basename($image['name']);

        if (!move_uploaded_file($image['tmp_name'], $uploadfile)) {
            array_push($errors, "Ошибка загрузки картинки");
        }
        if(empty($errors)){
            ProductsTable::create($name, $description, $material_id, $image['name'], $price);
        }
        return $errors;
    }

    public static function edit(int $id, string $name, string $description, int $material_id, $image, int $price): array
    {
        $errors = [];
        $product = ProductsTable::getById($id);
        if($product == null){
            array_push($errors, "Не найдено");
        }
        if(empty($name) || empty($description) || empty($material_id) || empty($image) || empty($price)){
            array_push($errors, "Переданы пустые поля");
        }
        $uploaddir = './uploads/';
        $uploadfile = $uploaddir . basename($image['name']);

        if (!move_uploaded_file($image['tmp_name'], $uploadfile)) {
            array_push($errors, "Ошибка загрузки картинки");
        }
        if(empty($errors)){
            ProductsTable::edit($id, $name, $description, $material_id, $image['name'], $price);
        }
        return $errors;
        
    }

    public static function delete(int $id)
    {
        $errors = [];
        $product = ProductsTable::getById($id);
        if($product == null){
            array_push($errors, "Блюдо не найдено");
        }
        if(empty($errors)){
            ProductsTable::delete($id);
        }
        return $errors;
    }

    public static function getAll(): array
    {
        return ProductsTable::getAll();
    }

    public static function getById(int $id): array|null
    {
        return ProductsTable::getById($id);
    }

    public static function getByFilter(string $name, string $description, $material_id, int $min_price, int $max_price): array
    {
        return ProductsTable::getByFilter($name, $description, $material_id, $min_price, $max_price);
    }

    public static function getMaterials(): array
    {
        return ProductsTable::getMaterials();
    }
}

?>