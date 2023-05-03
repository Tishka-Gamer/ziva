<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
?>

<div>
    <h1 class="view-text">Товары</h1>
    <div class="sort">
        <?php foreach ($types as $type) : ?>
            <div class="form-check">
                <input value="<?= $type->typeId ?>" id="<?= $type->typeId ?>" class="form-check-input" type="checkbox" name="type">
                <label class="form-check-label" for="<?= $type->typeId ?>"><?= $type->typeName ?></label>
            </div>
        <?php endforeach ?>   
    </div>
    <br>
    <a class="add-product" href="/app/admin/tables/product/add.php"><button>Создать</button></a>
    <div class="table">
        <table class="table-category ">
            <thead>
                <tr>
                    <th class="table-th">Картинка</th>
                    <th class="table-th">Название</th>
                    <th class="table-th">срок годности</th>
                    <th class="table-th">цена</th>
                    <th class="table-th">Количество</th>
                    <th class="table-th">тип</th>
                    <th class="table-th">Форма выпуска</th>
                </tr>
            </thead>
            <tbody class="products-container">
            </tbody>
        </table>
    </div>
</div>
<script src="/app/admin/assets/js/loadProducts.check.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
?>