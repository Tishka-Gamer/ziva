<?php

use App\models\Basket;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if($stream != null){
    //декодируем полученые данные
    $product_id = json_decode($stream)->data;
    $user_id = $_SESSION["id"];
    $action = json_decode($stream)->action;
    
    $productInBasket = match($action){
        "add"=>Basket::add($product_id, $user_id),
        "del"=>Basket::del($product_id, $user_id),
        "minus"=>Basket::minus($product_id, $user_id),
        "allDelete"=>Basket::allDelete($user_id),
    };

    echo json_encode([
        "productInBasket"=>$productInBasket,
        "allSum"=>Basket::allSum($user_id),
        "allCount"=>Basket::allCount($user_id),
    ], JSON_UNESCAPED_UNICODE);

}