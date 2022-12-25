<?php
    include_once "./header.php";
    if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_verification"])){
        $errors = UserActions::signUp();
    }
?>
    
<div class="d-flex flex-column align-items-center w-100">
    <?php 
    if(count($errors) > 0){
    foreach($errors as $error){ ?>
        <div class="text-danger"><?php print $error ?></div>
    <?php } ?>
    <form action="signUpAnswer.php" method="POST" class="col-md-5">
        <div class="form-group mt-2">
            <label for="email">E-mail</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Почта" required>
        </div>
        <div class="form-group mt-2">
            <label for="password">Пароль</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Пароль" required>
        </div>
        <div class="form-group mt-2">
            <label for="password">Повторите пароль</label>
            <input class="form-control" type="password" name="password_verification" placeholder="Подтвердите пароль" required>
        </div>
        <div class="col-auto mt-2 d-flex flex-column text-center">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </div>
    </form>
</div>
<?php } else{ ?>
    <div>Вы успешно зарегистрировались</div>
    <a href="./index.php">На главную</a>
    <a href="./signIn.php">Вход</a>
<?php } ?>
<?php
    include_once "./footer.php";
?>