<?php

use App\models\Basket;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$user_id = $_SESSION["id"];
$baskets = Basket::all($user_id);
$summer = Basket::allSum($user_id);
$count = Basket::allCount($user_id);
// $deleteAll = Basket::allDelete($user_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/baskets/basket.view.php";