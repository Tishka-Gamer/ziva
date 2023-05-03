<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\User;
session_start();
if(isset($_SESSION["id"]))
{
    $user = User::find($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <nav>
        <!-- <input type="checkbox"  class="open" id="top-box" hidden> -->
        <ul class="ul">
            <li><a href="/index.php"><img class="img" style="width:40px; height: 40px;" src="/upload/logo.svg" alt=""></a></li>
            <li class="color"><label for="search"><form action="/app/tables/search/search.php" method="post"><button >Поиск </button><input type="search" name="search"></form></label></li>
            <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
                <li class="nav-group color"><a href="/app/tables/users/auth.php">Войти</a></li>
                <li class="nav-group color"><a href="/app/tables/users/create.php">Регистрация</a></li>
            <?php else : ?>
                <li class="nav-group"><a href="/app/tables/users/profile.php"><img src="/upload/<?=$user->photo?>" alt="<?=$user->photo?>" style="width:40px; height: 40px; border-radius: 30px;"></a></li>
                <!-- <li class="link-nav"><a href="/app/tables/baskets/basketProd.php">Корзина</a></li> -->
                
                <li class="nav-group color"><a href="/app/tables/users/logaut.php">Выйти</a></li>
            <?php endif ?>
            <li class="link-nav color"><a href="/app/tables/categorys/category.php">Категории</a></li>
            <li class="link-nav color"><a href="/app/tables/about.php">Контакты</a></li>
            
            
        </ul>
</nav>

