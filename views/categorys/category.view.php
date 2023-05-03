<?php

use App\models\Type;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>
<div>
    <?php foreach ($categories as $category) : ?>
        <div>
            <h1 class="category-name"><?= $category->name ?></h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 ">
                <?php $typs = Type::filter($category->id); ?>
                <?php foreach ($typs as $type) : ?>
                    <div class="col category-col search">
                        <div>
                            <div class="category-card">
                                <img src="/upload/<?= $type->image ?>" class="card-img-top category-img search-img" alt="<?= $type->image ?>">
                                <input type="text" name="name" value="<?= $type->name ?>" style="display: none;">
                            </div>
                            <form action="/app/tables/products/type.php" method="post">
                                <input type="text" name="name" value="<?= $type->name ?>" style="display: none;">
                                <button class="category-btn" name="id" value="<?= $type->id ?>">
                                    <p><?= $type->name ?></p>
                                </button>
                            </form>
                        </div>
                    <hr>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; 