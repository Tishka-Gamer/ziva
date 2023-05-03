<?php
session_start();
use App\models\OrderAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $statuses = json_decode($_GET['statuses']);
    if (count($statuses) == 0 || count($statuses) == 3) {
        $res = OrderAdm::allOrder();
    } else {
        $res = OrderAdm::filter($statuses);
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
