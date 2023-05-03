<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/templates/header.php";

?>

<div class="container">
    <h1 class="view-text">Товары в заказе</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 products-container">
        <?php foreach ($tovars as $tovar) ?>
        <div class="col">
            <div class="card">
                <img src="/upload/<?= $tovar->photo ?>" class="card-img-top" alt="<?= $tovar->photo ?>" style="width: 200px; height: 200px;">
                <div class="card-body">
                    <button class="card-btn" name="id" value="<?= $tovar->id ?>">
                        <?= $tovar->name ?>
                    </button>
                    <p class="card-text"><?= $tovar->price ?> ₽</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.check.js"></script> -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
