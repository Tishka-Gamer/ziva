<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div class="rewiew">
    <h1><?= $product->name ?></h1>
    <img src="/upload/<?= $product->photo ?>" alt="" style="width: 200px; height: 200px;">
    <div>
        <div class="">
            <?php if (isset($otz)) : ?>
                <?php if (count($otz) != 0) : ?>
                    <div class="cards">
                        <div class="card-body card-body-user">
                            <div class="card-user">
                                <div class="card-user-info ">
                                    <img src="/upload/<?= $otz['0']->avatar ?>" alt="<?= $otz['0']->avatar ?>" style="width:40px; height: 40px; border-radius: 30px;">
                                    <h5 class="card-title card-title-user"><?= $otz['0']->user ?></h5>
                                </div>
                                <div class="card-user-form ">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">red</button>
                                </div>
                            </div>
                            <div>
                                <p class="card-text card-text-user"><?= $otz['0']->text ?></p>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php elseif ($userRev) : ?>
                    <div>
                        <form action="/app/tables/reviews/add.php" method="post">
                            <input type="text" name="review" required>
                            <button name="prod" value="<?= $product->id ?>">Добавить отзыв</button>
                            <p><?= $_SESSION['bad'] ?? "" ?></p>
                        </form>

                    </div>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div>

            <?php foreach ($reviews as $rev) : ?>
                <div class="cards mb-3">
                    <div class="card-body card-body-user">
                        <div class="card-user">
                            <div class="card-user-info">
                                <img src="/upload/<?= $rev->avatar ?>" alt="<?= $rev->avatar ?>" style="width:40px; height: 40px; border-radius: 30px;">
                                <h5 class="card-title card-title-user"><?= $rev->user ?></h5>
                            </div>

                        </div>
                        <div>
                            <p class="card-text card-text-user"><?= $rev->text ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
  
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Редактирование</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form action="/app/tables/reviews/red.php" method="post">
                    <div class="modal-body">
                        <textarea name="text" id="text" cols="60" rows="5"><?= $otz['0']->text ?></textarea>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="id" value="<?= $otz['0']->id ?>">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
unset($_SESSION['bad']); ?>