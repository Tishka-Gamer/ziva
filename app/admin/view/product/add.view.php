<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
// var_dump($releses);
?>
<div>
    <form action="/app/admin/tables/product/addProd.php" method="post" enctype="multipart/form-data" class="prod-form">
        <label for="name">Имя</label>
        <input type="text" name="name" value="<?= $_SESSION["name"] ?? "" ?>">
        <br>
        <label for="price">цена</label>
        <input type="number" name="price" value="<?= $_SESSION["price"] ?? "" ?>">
        <br>
        <label for="count">Количество</label>
        <input type="number" name="count" value="<?= $_SESSION["count"] ?? "" ?>">
        <br>
        <label for="experation_age">срок годности</label>
        <input type="number" name="experation_age" value="<?= $_SESSION["experation_age"] ?? "" ?>">
        <br>
        <label for="photo">фото</label>
        <input type="file" name="photo">
        <br>
        <label for="description"></label>
        <textarea name="description" id="description" cols="50" rows="10"></textarea>
        <br>
        <p><?= $_SESSION["error"] ?? "" ?></p>
        <label for="type_id">номер категории</label>
        <select name="type_id">
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type->typeId ?>"><?= $type->typeName ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <select name="relese">
            <?php foreach ($releses as $relese) : ?>
                <option value="<?= $relese->relese ?>"><?= $relese->relese ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <div class="contrat">
            <?php foreach ($conts as $cont) : ?>
                <input type="checkbox" name="cont[]" value="<?= $cont->id?>"><?= $cont->name?>
            <?php endforeach ?>
        </div>
        
        <button name="save">Готово</button>
    </form>

</div>
<!-- <script src="/app/admin/assets/js/loadContr.js"></script> -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
// unset($_SESSION['error']);
?>