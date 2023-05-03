<?php


require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div>
    <div class="head">
        <h1>Избранное</h1>
    </div>
    <h1 class="basket-empty" id="basket-empty"></h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4 products-container">
    <?php foreach ($favorites as $favorite) : ?>
        <div class="col basket-position">
            <div class="card">
                <img src="/upload/<?= $favorite->photo ?>" class="card-img-top" alt="<?= $favorite->photo ?>" style="width: 250px; height: 200px;">
                <div class="card-body">
                    <h1 class="card-title"><form action="/app/tables/products/show.php" method="post"><button name="id" value="<?= $favorite->product_id ?>"><?= $favorite->product_name ?></button></form></h1>
                    <p class="price" data-product-id="<?= $favorite->product_id ?>"><?= $favorite->price ?> руб</p>
                    <form action="/app/tables/baskets/del.php"><button class="delete" id="product-del-<?= $favorite->product_id ?>" data-product-id="<?= $favorite->product_id ?>" value="<?= $favorite->product_id ?>">Удалить</button></form>
                    <form action="/app/tables/baskets/add.php" method="post">
                        <button name="product_id" value="<?= $favorite->product_id ?>">Поместить в корзину</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    <form action="/app/tables/favorites/clear.php" method="post"><button class="all-delete" id="all-delete">Очистить избранное </button></form>
    <!-- <form action="/app/tables/baskets/order.php">
        <button class="order" id="order">Оформить заказ</button>
    </form> -->
    
    
</div>
<!-- 
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadBasket.js"></script> -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>