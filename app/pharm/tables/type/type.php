<?php
session_start();

use App\models\CategoryAdm;
use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $types = TypeAdm::all();
    $categories = CategoryAdm::all();

    json_encode($types, JSON_UNESCAPED_UNICODE);

    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/type/type.view.php";
}
