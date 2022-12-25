<?php
class ProductsTable
{
    public static function create(string $name, string $description, int $material_id, $image, int $price)
    {
        $query = Database::prepare('INSERT INTO products (name, description, material_id, image, price) VALUES(:name, :description, :material_id, :image, :price)');
        $query->bindValue(":name", $name);
        $query->bindValue(":description", $description);
        $query->bindValue(":material_id", $material_id);
        $query->bindValue(":image", $image);
        $query->bindValue(":price", $price);
        if(!$query->execute()){
            throw new PDOException("При добавлении произошла ошибка");
        }
    }
    public static function edit(int $id, string $name, string $description, int $material_id, $image, int $price)
    {
        $query = Database::prepare('UPDATE products SET name=:name, description=:description, material_id=:material_id, image=:image, price=:price WHERE id=:id');
        $query->bindValue(":id", $id);
        $query->bindValue(":name", $name);
        $query->bindValue(":description", $description);
        $query->bindValue(":material_id", $material_id);
        $query->bindValue(":image", $image);
        $query->bindValue(":price", $price);
        if(!$query->execute()){
            throw new PDOException("При изменении произошла ошибка");
        }
    }
    public static function delete(int $id)
    {
        $query = Database::prepare('DELETE FROM products where id=:id');
        $query->bindValue(":id", $id);
        if(!$query->execute()){
            throw new PDOException("При удалении произошла ошибка");
        }
    }
    public static function getAll(): array
    {
        $query = Database::prepare('SELECT products.*, materials.name as material
         FROM products
         LEFT JOIN materials ON materials.id = products.material_id');
        $query->execute();
        $dishes = $query->fetchAll();
        return $dishes;
    }
    public static function getById(int $id): array|null
    {
        $query = Database::prepare('SELECT * FROM products WHERE id=:id');
        $query->bindValue(":id", $id);
        $query->execute();
        $product = $query->fetchAll();
        if(!count($product)){
            return null;
        }
        return $product[0];
    }
    public static function getMaterials(): array
    {
        $query = Database::prepare('SELECT * FROM materials');
        $query->execute();
        $menus = $query->fetchAll();
        return $menus;
    }
    public static function getByFilter(string $name, string $description, $material_id, int $min_price, int $max_price): array|null
    {
        $string = "SELECT products.*, materials.name as material 
        FROM products 
        LEFT JOIN materials ON materials.id = products.material_id
        WHERE products.price<=:max_price AND products.price>=:min_price";
        if($material_id != ""){
            $string .= " AND products.material_id = $material_id";
        }
        if($name != ""){
            $string .= " AND products.name LIKE '%$name%'";
        }
        if($description != ""){
            $string .= " AND products.description LIKE '%$description%'";
        }
        $query = Database::prepare($string);
        $query->bindValue(":min_price", $min_price);
        $query->bindValue(":max_price", $max_price);
        if(!$query->execute()){
            throw new PDOException("Ошибка фильтрации");
        }
        $products = $query->fetchAll();
        return $products;
    }
}
?>