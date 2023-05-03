<?php

use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
$tovars = Product::top();
?>
<div class="index">
    <div class="fon">
        <div class="fon-text">
            <h1 class="h1">Лекарства по доступным ценам</h1>
            <h1 class="h1">Прямо не выходя из дома можно заказать множество лекарств и получить доставкой сегодня же или забрать с помощью самовывоза в ближайшей аптеке без очереди.</h1>
        </div>
    </div>
    <div>
        <h1 class="index-h1 pop">Популярное</h1>
        <div class="row popylar">
            <?php foreach ($tovars as $tovar) : ?>
                <div class="col">
                    <div class="card h-100 index-card" style="width: 200px;">
                        <img src="/upload/<?= $tovar->photo ?>" class="card-img-top" alt="<?= $tovar->photo ?>">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div>
        <h1 class="index-h1">Почему мы?</h1>
        <div class="row cont">
            <div class="col whyme">
                <div class="card h-100 index-card" style="width: 200px;">
                    <img src="/upload/orzivvi.svg" class="card-img-top what" alt="..." style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Много положительных отзывов</h5>
                        <form action="" method="post"><button class="who-btn">Посмотреть</button></form>
                    </div>
                </div>
            </div>
            <div class="col whyme">
                <div class="card h-100 index-card" style="width: 200px;">
                    <img src="/upload/tablet.svg" class="card-img-top what" alt="..." style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Отличное качество товара</h5>
                        <form action="/app/tables/about.php" method="post"><button class="who-btn">Перейти к док-ции</button></form>
                    </div>
                </div>
            </div>
            <div class="col whyme">
                <div class="card h-100 index-card" style="width: 200px;">
                    <img src="/upload/bagaz.svg" class="card-img-top what" alt="..." style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Доставка прямо на дом в течении дня</h5>
                        <form action="/app/tables/categorys/category.php" method="post"><button class="who-btn">Перейти к товарам</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carta">
        <h1 class="index-h1 h2 me">О нас</h1>
        <h1>Мы находимся в разных городах Челябинской области.</h1>
        <img src="/upload/sity.jpg" alt="" class="city">
        <form action=""><button class="index-btn">
                <h5>Перейти к категориям</h5>
            </button></form>
    </div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>