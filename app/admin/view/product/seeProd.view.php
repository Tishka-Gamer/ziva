<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";

?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 products-container">
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
            </div>
        </div>
    </div>
</div>
<!-- <script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.check.js"></script> -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';