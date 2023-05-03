<?php
session_start();

use App\models\ProductAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $product_id = $_POST['id'];
    ProductAdm::delProduct($product_id);
    // var_dump($_POST['btn']);
    unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/" . $_POST['btn']);
    header("Location: /app/admin/tables/product/product.php");
}
