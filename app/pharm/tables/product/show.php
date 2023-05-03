<?php

use App\models\ProductPh;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";

if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $product = ProductPh::find($_POST["id"]);
    $conts = ProductPh::conts($_POST["id"]);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/product/show.view.php";
}
