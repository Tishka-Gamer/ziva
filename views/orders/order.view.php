<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="container">
    <h1>Оформление заказа</h1>
    <div>
        <form action="/app/tables/baskets/order.php" method="post">
            <p>ФИО получателя <?= $user->surname ?> <?= $user->name ?> <?= $user->firstname ?></p>
            <?php if(!$yon) : ?>
                <p>выберите способ доставки</p>
                <label for="radio" class="rvbr">
                    <input type="radio" name="radio" value="0">самовывоз
                    <input type="radio" name="radio" value="1">доставка
                </label>
                <div>
                    <label for="ddost">введите адрес</label>
                    <input type="text" name="ddost" class="ddost">
                </div>
            <?php endif ?>
            <div>
                <label for="address">Выберите аптеку</label>
                <select name="address" id="address" class="dsam">
                <?php foreach($addresses as $address): ?>
                <option value="<?= $address->name?>"><?= $address->name?></option>
                <?php endforeach ?>
            </select>
            </div>
            <div>
                <h1 class="price">Итоговая сумма: ₽</h1>
                <h1>Количество товаров в заказе: </h1>
            </div>
            <button>Продолжить</button>
        </form>
    </div>
    <!-- <div class="row row-cols-1 row-cols-md-3 g-4 products-container">
        <?php foreach ($tovars as $tovar) ?>
        <div class="col">
            <div class="card">
                <img src="/upload/<?= $tovar->photo ?>" class="card-img-top" alt="<?= $tovar->photo ?>">
                <form action="/app/tables/products/show.php" method="post">
                    <div class="card-body">
                        <button name="id" value="<?= $tovar->id ?>">
                            <h5 class="card-title"><?= $tovar->name ?></h5>
                        </button>
                        <p class="card-text"><?= $tovar->price ?> ₽</p>
                    </div>
                </form>
                <ul>
                    <?php foreach ($conts as $cont) : ?>
                        <li><?= $cont->contrName ?></li>
                    <?php endforeach ?>
                </ul>
                <form action="/app/tables/baskets/add.php" method="post">
                    <button name="product_id" value="<?= $tovar->id ?>">Добавить в корзину</button>
                </form>
                <form action="/app/tables/favorites/add.php" method="post">
                    <button name="product_id" value="<?= $tovar->id ?>">Добавить в избранное</button>
                </form>
            </div>
        </div>
    </div> -->
</div>
<script>
let rvbr = document.querySelector(".rvbr")
let ddost = document.querySelector(".ddost")
let dsam = document.querySelector(".dsam")

rvbr.addEventListener("change", (e)=> {
    if(e.target.value == 0)
    {
       ddost.disabled = true
       dsam.disabled = false;
    }
    else if(e.target.value == 1)
    {
        dsam.disabled = true;
        ddost.disabled = false
    }
})
</script>
<!-- <script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.check.js"></script> -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>