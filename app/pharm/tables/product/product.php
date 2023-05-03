<?php
session_start();

use App\models\ProductPh;
use App\models\TypeAdm;
// var_dump($_SESSION);
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $products = ProductPh::all();
    $types = TypeAdm::all();
    // var_dump($_SESSION);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/product/product.view.php";
}
