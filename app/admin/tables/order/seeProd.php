<?php
session_start();
use app\models\OrderAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $order_id = $_POST['id'];
    $tovars = OrderAdm::seeee($order_id);
    $price = OrderAdm::allPrice($order_id);
    $count = OrderAdm::allCount($order_id);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/order/seeProd.view.php";
}
