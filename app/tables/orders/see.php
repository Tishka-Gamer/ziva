<?php
session_start();
use app\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!$_SESSION["auth"]) {
    header("Location: /");
} else {
    
    $order_id = $_POST['order'];
    // var_dump($order_id);
    $tovars = Order::seeee($order_id);
    $price = Order::allPrice($order_id);
    $count = Order::allCount($order_id);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/views/orders/seeProd.view.php";
}
