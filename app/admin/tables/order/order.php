<?php
session_start();
use app\models\OrderAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $orders = OrderAdm::allOrder();
    $statuses = OrderAdm::allStatus();

    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/order/order.view.php";
}
