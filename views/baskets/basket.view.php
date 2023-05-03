<?php

use App\models\Basket;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div>
    <div class="head">
        <h1>Корзина</h1>
    </div>
    <h1 class="basket-empty" id="basket-empty"></h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4 products-container">
    <?php foreach ($baskets as $basket) : ?>
        <div class="col basket-position">
            <div class="card">
                <img src="/upload/<?= $basket->photo ?>" class="card-img-top" alt="<?= $basket->photo ?>" style="width: 250px; height: 200px;">
                <div class="card-body">
                    <h1 class="card-title"><?= $basket->product_name ?></h1>
                    <p class="price" data-product-id="<?= $basket->product_id ?>"><?= $basket->price ?> руб</p>
                    <p class="count card-text" id="product-count-<?= $basket->product_id ?>" ><?= $basket->count ?> шт</p>
                    <button name="plus" class="plus" data-product-id="<?= $basket->product_id ?>">+</button>
                    <button name="minus"class="minus" data-product-id="<?= $basket->product_id ?>">-</button>
                    <button class="delete" id="product-del-<?= $basket->product_id ?>" data-product-id="<?= $basket->product_id ?>">Удалить</button>
                    <p class="itogo" id="product-price-<?= $basket->product_id ?>" data-product-id="<?= $basket->product_id ?>"><?= $basket->price_position?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    <h1 class="summa" id="obsh">Общая сумма <?= $summer ?> рублей</h1>
    <h1 class="count" id="total-count">Количество <?= $count?> шт</h1>
    <button class="all-delete" id="all-delete">Очистить корзину </button>
    <form action="/app/tables/orders/create.php">
        <button class="order" id="order">Оформить заказ</button>
    </form>
    
    
</div>

<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadBasket.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; 