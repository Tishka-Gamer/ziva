<?php
session_start();


require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";


?>

<div class="cont">
    <form action="/app/tables/users/authCkeck.php" method="post" class="auto-form">
        <div class="auto-container">
            <h1>Авторизация</h1>
            <div class="auto-group">


                <div class="form-group">
                    <label for="number" class="form-label">Номер</label>
                    <input type="tel" name="number" class="form-control" id="number" value="<?= $_SESSION["number"] ?? "" ?>">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <p class="error"><?= $_SESSION["error"] ?? "" ?></p>

                <button class="btn-vhod" name="btn">Авторизоватся</button>

            </div>
            <!-- <div class="form-group">
            <button class="btn_help" name="btn_help">Забыл пароль</button>
        </div> -->
        </div>
    </form>
</div>
<style>
    .error {
        color: red;
    }
</style>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
unset($_SESSION["error"]);                          


