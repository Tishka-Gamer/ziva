<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="container">
    <h1>История заказов</h1>
    <div class="">
        <?php foreach ($orders as $order) : ?>
            <div class="all-order">
                <h5 class="all-order-h5">Статус <?= $order->status ?></h5>
                <div class="elem-all-order">
                    <p>Доставка по адресу <?= $order->address ?></p>
                    <p>Дата создания <?= $order->date_start ?></p>
                    <p>Количество товаров в заказе <?= $order->prodCount ?></p>
                </div>
                <form action="/app/tables/orders/see.php" method="post"><button class="all-order-btn" name="order" value="<?= $order->order_id?>">Посмотреть товары</button></form>
                <!-- <h5>Сумма </h5> -->
            </div>
        <?php endforeach ?>
    </div>
    
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>