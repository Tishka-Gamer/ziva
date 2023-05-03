<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
?>
<div>
    <form action="/app/admin/tables/admin/addPharm.php" method="post">
        <label for="name">Имя</label>
        <input type="text" name="name">
        <br>
        <label for="password">Пароль</label>
        <input type="password" name="password">
        <br>
        <p><?= $_SESSION["error"] ?? "" ?></p>
        <button name="save">Создать</button>
    </form>

</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
unset($_SESSION['error']);
?>