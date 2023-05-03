<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
        <div class="col show-pr">
            <div class="card show-cr">
                <div class="sh-col">
                    <div>
                        <img src="/upload/<?= $product->photo ?>" class="card-img-top show-ig" alt="<?= $product->photo ?>">

                    </div>
                    <div class="sh-col-info">
                        <h5 class="card-title sh-tit"><?= $product->name ?></h5>
                        <p class="card-text price">цена: <?= $product->price ?> ₽</p>
                        <?php if(!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
                        <form action="/app/tables/reviews/review.php" method="post">
                            <button name="product_id" class="prod-btn" value="<?= $product->id ?>">Посмотреть отзывы</button>
                        </form>
                        <?php else : ?>
                            <form action="/app/tables/reviews/review.php" method="post">
                            <button name="product_id" class="prod-btn" value="<?= $product->id ?>">Посмотреть отзывы</button>
                             </form>
                        <form action="/app/tables/baskets/save.basket.php" method="post">
                            <button name="addproduct_id" class="prod-btn" value="<?= $product->id ?>">Добавить в корзину</button>
                        </form>
                        <form action="/app/tables/baskets/save.basket.php" method="post">
                            <button name="addproduct_id" class="prod-btn" value="<?= $product->id ?>">Добавить в корзину</button>
                        </form>
                        <?php endif ?>
                    </div>
                </div>
                <div class="card-body show-bd">
                    <p class="card-text">Показания к применению: <?= $product->description ?></p>
                    <p class="card-text">Форма выпуска: <?= $product->relese ?></p>
                    <p class="card-text">Противопоказания: </p>
                    <ul>
                        <?php foreach ($conts as $cont) : ?>
                            <li><?= $cont->contrName ?></li>
                        <?php endforeach ?>
                    </ul>
                    
                </div>
                <!-- <a href="/app/tables/products/show.php?id=<?= $product->id ?>" class="btn btn-primary">подробнее</a> -->
            </div>
        </div>
    </div>
<br>
</div>
<?php
$_SESSION['product_id'] = $product->id;
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
