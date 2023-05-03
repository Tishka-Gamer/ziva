<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 products-container search">
        <?php foreach ($tovars as $tovar) : ?>
        <div class="col">
            <div class="card search-card">
                <img src="/upload/<?= $tovar->photo ?>" class="card-img-top" alt="<?= $tovar->photo ?>" class="search-img">
                <form action="/app/tables/products/show.php" method="post">
                    <div class="card-body">
                        <button name="id" value="<?= $tovar->id ?>">
                            <h5 class="card-title"><?= $tovar->name ?></h5>
                        </button>
                        <p class="card-text price"><?= $tovar->price ?> ₽</p>
                    </div>
                </form>
                <form action="/app/tables/baskets/add.php" method="post">
                    <button name="product_id" value="<?= $tovar->id ?>">Добавить в корзину</button>
                </form>
                <form action="/app/tables/favorites/add.php" method="post">
                    <button name="product_id" value="<?= $tovar->id ?>">Добавить в избранное</button>
                </form>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <form action="/app/tables/baskets/basketProd.php" method="post"><button>В корзину</button></form>
</div>
<!-- <script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.check.js"></script> -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>