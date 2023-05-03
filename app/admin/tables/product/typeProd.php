<?php

use App\models\ProductAdm;
use App\models\TypeAdm;

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
    $type_id = $_POST['id'];
    $type = TypeAdm::find($type_id);
    $tovars = ProductAdm::findType($type_id);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/typeProd.view.php";
}
