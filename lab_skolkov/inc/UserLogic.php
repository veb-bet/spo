<?php
class UserLogic{

    public static function signUp(string $email, string $password, string $password_verificarion): array
    {
        $errors = [];
        $user = UserTable::getByEmail($email);
        
        if(empty($email) || empty($password) || empty($password_verificarion)){
            array_push($errors, "Введите все данные");
            return $errors;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Почта введена неверно");
        }
        if($user != null){
            array_push($errors, "Пользователь c такой почтой уже существует");
        }
        if($password != $password_verificarion){
            array_push($errors, "Пароли не совпадают");
        }
        if(empty($errors)){
            UserTable::create($email, password_hash($password, PASSWORD_DEFAULT));
        }
        return $errors;
    }

    public static function signIn(string $email, string $password): string
    {
        if(static::isAutorized()){
            return "Вы уже авторизованы";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Почта введена неверно";
        }
        $user = UserTable::getByEmail($email);
        if($user == null){
            return "Пользователь не найден";
        }

        if(!password_verify($password, $user["password"])){
            return "Неверно указан пароль";
        }
        
        $_SESSION["USER_ID"] = $user["id"];
        return "";
    }

    public static function signOut()
    {
        $_SESSION["USER_ID"] = null;
    }

    public static function isAutorized(): bool
    {
        return isset($_SESSION["USER_ID"]) && intval($_SESSION["USER_ID"]) > 0;
    }

    public static function current(): array|null
    {
        if(!static::isAutorized()){
            return null;
        }
        return UserTable::getById($_SESSION["USER_ID"]);
    }
}

?>