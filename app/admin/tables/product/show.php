<?php

use App\models\ProductAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $product = ProductAdm::find($_POST["id"]);
    $conts = ProductAdm::conts($_POST["id"]);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/show.view.php";
}
