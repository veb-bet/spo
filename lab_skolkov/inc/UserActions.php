<?php
class UserActions
{
    public static function signIn()
    {
        return UserLogic::signIn($_POST['email'], $_POST["password"]);
    }

    public static function signUp()
    {
        return UserLogic::signUp($_POST['email'], $_POST["password"], $_POST["password_verification"]);
    }
}

?>