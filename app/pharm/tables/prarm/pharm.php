<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/bootstrap.php";


use App\models\AdminPh;
use App\models\ProductPh;
use App\models\TypeAdm;

$adm = AdminPh::findAdmin($_POST["login"], $_POST['password']);
if ($adm != null) {
    $_SESSION["pharm"] = true;
    $log = $_POST['login'];
    $pharm = AdminPh::find($log);
    $_SESSION["pharmId"] = $pharm->id;
    $types = TypeAdm::all();
    $products = ProductPh::all();
    header("Location: /app/pharm/tables/product/product.php");
} else {
    $_SESSION["pharm"] = false;
    $_SESSION["error"] = "Такого фармацевта не существует или не верный пароль";
    header("Location: /app/pharm/");
}
