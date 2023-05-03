<?php
session_start();

use App\models\ProductAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $type = json_decode($_GET['types']);
    if (count($type) == 0) {
        $res = ProductAdm::all();
    } else {
        $res = ProductAdm::productsByManyCategories($type);
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
