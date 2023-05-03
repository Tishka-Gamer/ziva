<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
?>

<div>
    <h1>Типы</h1>
    <div class="sort">
        <?php foreach ($categories as $category) : ?>
            <div class="form-check">
                <input value="<?= $category->id ?>" id="<?= $category->id ?>" class="form-check-input" type="checkbox" name="category">
                <label class="form-check-label" for="<?= $category->id ?>"><?= $category->name ?></label>
            </div>
        <?php endforeach ?>
    </div>
    <a href="/app/admin/tables/type/add.php"><button>Создать</button></a>
    <div class="table">
        <table class="table-category">
            <thead>
                <tr>
                    <th class="table-th">картинка</th>
                    <th class="table-th">Название</th>
                    <th class="table-th">категория</th>
                </tr>
            </thead>
            <tbody class="products-container">

            </tbody>
        </table>
        
    </div>
</div>
<script src="/app/admin/assets/js/loadType.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
?>