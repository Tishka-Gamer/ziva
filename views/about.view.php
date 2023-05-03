<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>
<div>
    <div class="head">
        <h1>Контакты</h1>
    </div>
    <div>
        <img src="/upload/" alt="">
    </div>
    <div class="about-p">
        <p>Мы находимся в разных городах Челябинской области. Нас легко найти, так как есть список со всеми адресами наших аптек и вы можете выбрать самую ближайшую. А если аптека находиться далеко, то мы с радостью доставим самые нужные лекарства прямо на дом. Также наши товары попадают к нам прямо от поставщиков поэтому лекарства дешевле и всегда в наличии.</p>
    </div>
    <div class="me-adresses">
        <h1>Наши адреса</h1>
        <div class="addresses">
           <?php foreach($addresses as $adres) :?>
            <p><?= $adres->name?></p>
            <?php endforeach ?>
        </div>
    </div>
    <div class="addresses-btn">
        <form action="/app/tables/categorys/category.php"><button>Перейти к товарам</button></form>
    </div>
    <!-- <div class="container-carousel">

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                
                <?php foreach ($prodfive as $key => $prod) : ?>
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>" >
                        <img style="height: 600px;" src="/upload/<?= $prod->image ?>" class="d-block w-100" alt="...">
                        <h1 class="title-slider-card"><?= $prod->name ?></h1>
                    </div>
                <?php endforeach ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>
        



    </div> -->
</div>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>