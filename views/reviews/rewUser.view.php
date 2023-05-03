<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div>
    <div>
        <?php foreach ($reviews as $rev) : ?>
            <div class="cards mb-3">
                <div class="card-body">
                    <div>
                        <h5 class="card-title"><?= $rev->product ?></h5>
                    </div>
                    <div>
                        <p class="card-text"><?= $rev->text ?></p>
                        
                    </div>
                    <form action="/app/tables/reviews/del.php" method="post"><button name="id" value="<?= $rev->id ?>">Удалить</button></form>
                    <form action="/views/reviews/red.view.php" method="post"><button name="id" value="<?= $rev->id ?>">Редактировать <input type="text" name="text" value="<?= $rev->text ?>" style="display: none;"></button></form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>