<?php
session_start();

use App\models\ProductPh;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $type = json_decode($_GET['types']);
    if (count($type) == 0) {
        $res = ProductPh::all();
    } else {
        $res = ProductPh::productsByManyCategories($type);
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
