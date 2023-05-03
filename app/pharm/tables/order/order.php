<?php
session_start();
use app\models\OrderPh;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $orders = OrderPh::allOrder();
    $statuses = OrderPh::allStatus();

    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/order/order.view.php";
}
