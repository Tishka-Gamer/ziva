<?php
session_start();
if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("location: /");
    die();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

// var_dump($_SESSION);

?>
<div class="profil-global">
    <!-- <h1>Профиль</h1> -->
    <div class="profil-lichnoe">
        <div>
            <img class="profil-img" src="/upload/<?= $user->photo ?>" alt="<?= $user->photo ?>">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Изменить</button>
        </div>
        <div class="profil-data">
            <p class="profil-p">Фамилия Имя Отчество</p>
            <div class="profil-data-dan">
                <h5 class="profil-text"> <?= $user->surname ?> <?= $user->name ?> <?= $user->firstname ?></h5>
            </div>
            <p class="profil-p">Телефон</p>
            <div class="profil-data-dan">
                <h5 class="profil-text"><?= $user->phone ?></h5>
            </div>
            <p class="profil-p">E-mail</p>
            <div class="profil-data-dan">
                <h5 class="profil-text"><?= $user->email ?></h5>
            </div>
            <p class="profil-p">Дата рождения</p>
            <div class="profil-data-dan">
                <h5 class="profil-text"><?= $user->date_birthday ?></h5>
            </div>
        </div>

    </div>
    <div class="profil-buttons">
        <form action="/app/tables/orders/all.php" method="post"><button class="profil-btn">История заказов</button></form>
        <form action="/app/tables/favorites/favorite.php" method="post"><button class="profil-btn">Избраное</button></form>
        <form action="/app/tables/reviews/rewiew.user.php" method="post"><button class="profil-btn">Отзывы</button></form>
        <form action="/app/tables/baskets/basketProd.php" method="post"><button class="profil-btn">Корзина</button></form>
    </div>
    <div class="profil-button">
        <form action="/app/tables/categorys/category.php"><button class="profil-btn">Перейти к товарам</button></form>
    </div>


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/app/tables/users/" method="post" enctype="multipart/form-data">
                        <img src="/upload/<?= $user->photo ?>" alt="/upload/<?= $user->photo ?>">
                        <input type="text" value="<?= $user->photo ?>" name="oldImage" hidden>
                        <input type="file" name="image">
                        <button name="photo">Сменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Кнопка-триггер модального окна -->


    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение фото</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form action="/app/tables/users/red.php" method="post" enctype="multipart/form-data">
                        <img src="/upload/<?= $user->photo ?>" alt="/upload/<?= $user->photo ?>" style="width: 200px; height: 200px;">
                        <input type="text" value="<?= $user->photo ?>" name="oldImage" hidden>
                        <input type="file" name="image">
                        <button name="photo">Сменить</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>