<?php
session_start();

use App\models\Contraindications;
use App\models\ProductAdm;
use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $types = TypeAdm::all();
    $conts = Contraindications::all();
    $releses = ProductAdm::allRelese();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/add.view.php";
}
