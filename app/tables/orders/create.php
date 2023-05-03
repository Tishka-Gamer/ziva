<?php

use app\models\Basket;
use App\models\Product;
use app\models\Things;
use App\models\User;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user_id = $_SESSION["id"];
$user = User::find($user_id); 
$rel = Product::findrel();
$relbask = Basket::findPrd($user_id);
$arr = [];
$yon = "";
foreach ($rel as $item) 
{
    array_push($arr, $item->id);
}
foreach ($relbask as $item) 
{
    $yon = array_key_exists($item->product_id, $arr);
}
$addresses = Things::addresses();
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/orders/order.view.php";