<?php

use app\models\OrderAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $order = $_SESSION['order_id'];
    $status_id = $_GET["status_id"];
    echo $_GET["status_id"];
    OrderAdm::editStatus($status_id, $order);
    if($status_id == "отдан")
    {
        OrderAdm::editData($order);
    }
    // if($status_id == "собран")
    // {
    //     OrderAdm::editData($order);
    // }
    header("Location: /app/admin/tables/order/order.php");
}
