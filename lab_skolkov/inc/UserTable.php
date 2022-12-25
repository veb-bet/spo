<?php
class UserTable
{

    public static function create(string $email, string $password)
    {
        $query = Database::prepare('INSERT INTO users (email, password) VALUES(:email, :password)');
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        if(!$query->execute()){
            throw new PDOException("При добавлении пользователя произошла ошибка!");
        }
    }

    public static function getByEmail(string $email): array|null
    {
        $query = Database::prepare('SELECT * FROM users WHERE email=:email');
        $query->bindValue(":email", $email);
        $query->execute();
        $user = $query->fetchAll();
        if(!count($user)){
            return null;
        }
        return $user[0];
    }

    public static function getById(string $id): array|null
    {
        $query = Database::prepare('SELECT * FROM users WHERE id=:id');
        $query->bindValue(":id", $id);
        $query->execute();
        $user = $query->fetchAll();
        if(!count($user)){
            return null;
        }
        return $user[0];
    }


}


?>