<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";
use App\models\Contraindications;
use App\models\ProductPh;
use App\models\TypeAdm;


if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $product = ProductPh::search($_POST['btn']);
    $types = TypeAdm::all();
    $releses = ProductPh::allRelese();
    $conts = Contraindications::all();
    $prodConts = Contraindications::ContProd($_POST['btn']);
    $conttts = Contraindications::redContProd($_POST['btn']);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/product/red.view.php";
}
