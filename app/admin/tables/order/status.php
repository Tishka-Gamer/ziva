<?php
session_start();

use App\models\OrderAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $statuses = OrderAdm::allStatus();
    $_SESSION['order_id'] = $_POST['id'];
    $_SESSION['status_id'] = $_POST['status_id'];

    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/order/status.view.php";
}
