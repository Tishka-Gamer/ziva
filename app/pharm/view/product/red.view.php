<?php

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/templates/header.php";
?>

<div style="height: 16rem;">
    <form action="/app/pharm/tables/product/reduct.php" method="post" enctype="multipart/form-data" class="prod-form">

        <img src="/upload/<?= $product->photo ?>" alt="<?= $product->photo ?>" style="width: 100px; height: 100px;">
        <input type="text" name="oldImage" id="" value="<?= $product->photo ?>" style="display: none;">
        <br>
        <label for="name">Имя</label>
        <input type="text" name="name" value="<?= $product->name ?>">
        <br>
        <label for="experation_age">срок годности</label>
        <input type="number" name="experation_age" value="<?= $product->experation_age ?>">
        <br>
        <label for="price">цена</label>
        <input type="number" name="price" value="<?= $product->price ?>">
        <br>
        <label for="count">Количество</label>
        <input type="number" name="count" value="<?= $product->count ?>">
        <br>

        <label for="image">фото</label>
        <input type="file" name="image" value="<?= $product->photo ?>">
        <br>
        <label for="description">Описание</label>
        <textarea name="description" id="description" cols="50" rows="10"><?= $product->description ?></textarea>
        <br>

        <p><?= $_SESSION["error"] ?? "" ?></p>
        <label for="type_id">Тип</label>
        <select name="type_id">
            <?php foreach ($types as $type) : ?>
                <option <?= $type->typeId == $product->type_id ? "selected" : "" ?> value="<?= $type->typeId ?>"><?= $type->typeName ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <label for="relese">Форма выпуска</label>
        <select name="relese">
            <?php foreach ($releses as $relese) : ?>
                <option <?= $relese->relese == $product->relese ? "selected" : "" ?> value="<?= $relese->relese ?>"><?= $relese->relese ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <?php foreach ($conts as $cont) : ?>

            <input type="checkbox" <?= array_key_exists($cont->id, $prodConts) ? "checked" : "" ?> name="cont[]" value="<?= $cont->id ?>"><?= $cont->name ?>

        <?php endforeach ?>

        <button name="id" value="<?= $product->id ?>">Готово</button>

    </form>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
unset($_SESSION["error"]);
// in_array( $cont->id, $prodConts ) 
?>