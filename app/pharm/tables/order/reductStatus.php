<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
use app\models\OrderPh;

session_start();
// var_dump($_SESSION);
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $order = $_SESSION['order_id'];
    $status_id = $_GET["status_id"];
    $pharm = $_SESSION['pharmId'];
    OrderPh::editStatus($status_id, $pharm, (int)$order,);
    if($status_id == "отдан")
    {
        OrderPh::editData($order);
    }
    header("Location: /app/pharm/tables/order/order.php");
}
