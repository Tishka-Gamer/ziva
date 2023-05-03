<?php
session_start();

use App\models\ProductAdm;
use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $products = ProductAdm::all();
    $types = TypeAdm::all();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/product.view.php";
}
