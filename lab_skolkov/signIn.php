<?php
    include_once "./header.php";
?>
<div class="d-flex flex-column align-items-center w-100">
    <form action="signInAnswer.php" method="POST" class="col-md-5">
        <div class="form-group mt-2">
            <label for="email">E-mail</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Почта" required>
        </div>
        <div class="form-group mt-2">
            <label for="password">Пароль</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Пароль" required>
        </div>
        <div class="col-auto mt-2 d-flex flex-column text-center">
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </form>
</div>
<?php
    include_once "./footer.php";
?>