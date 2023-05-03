<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/templates/header.php";
?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
        <div class="col">
            <div class="card">
                <img src="/upload/<?=$product->photo ?>" class="card-img-top" alt="<?=$product->photo ?>" style="width: 100px; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->name?></h5>
                    <p class="card-text">цена: <?=$product->price?> ₽</p>
                    <p class="card-text">Показания к применению: <?=$product->description ?></p>
                    <p class="card-text">Форма выпуска: <?=$product->relese?></p>
                    <p class="card-text">Противопоказания: </p>
                    <ul>
                        <?php foreach($conts as $cont) :?>
                        <li><?= $cont->contrName?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- <a href="/app/tables/products/show.php?id=<?= $product->id?>" class="btn btn-primary">подробнее</a> -->
            </div>
        </div>
    </div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
