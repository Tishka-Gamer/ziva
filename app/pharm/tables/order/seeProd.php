<?php
session_start();
use App\models\OrderPh;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";

if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $order_id = $_POST['id'];
    $tovars = OrderPh::seeee($order_id);

    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/order/seeProd.view.php";
}
