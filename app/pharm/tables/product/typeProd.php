<?php
session_start();
use App\models\ProductPh;
use App\models\TypeAdm;

if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
    $type_id = $_POST['id'];
    $type = TypeAdm::find($type_id);
    $tovars = ProductPh::findType($type_id);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/product/typeProd.view.php";
}
