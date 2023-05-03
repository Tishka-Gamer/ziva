<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
?>
<div>
    <form action="/app/admin/tables/type/addType.php" method="post" enctype="multipart/form-data" class="type-form">
        <label for="name">Имя</label>
        <input type="text" name="name" value="<?= $_SESSION["name"] ?? "" ?>">
        <br>
        <br>
        <label for="photo">фото</label>
        <input type="file" name="photo">
        <br>
        <p><?= $_SESSION["error"] ?? "" ?></p>
        <label for="category_id">номер категории</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
        <button name="save">Готово</button>
    </form>

</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
// unset($_SESSION['error']);
?>