<?php
session_start();
use App\models\Contraindications;
use App\models\ProductAdm;
use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $product = ProductAdm::search($_GET['id']);
    $types = TypeAdm::all();
    $releses = ProductAdm::allRelese();
    $conts = Contraindications::all();
    $prodConts = Contraindications::ContProd($_GET['id']);
    $conttts = Contraindications::redContProd($_GET['id']);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/red.view.php";
}
