<?php
session_start();

use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $category = json_decode($_GET['categorys']);
    if (count($category) == 0) {
        $res = TypeAdm::all();
    } else {
        $res = TypeAdm::loadCategory($category);
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
