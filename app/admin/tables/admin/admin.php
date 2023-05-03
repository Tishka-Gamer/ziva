<?php
session_start();
unset($_SESSION['error']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";

use App\models\Admin;
use app\models\OrderAdm;
use App\models\ProductAdm;
use App\models\TypeAdm;


$adm = Admin::findAdmin($_POST["login"], $_POST['password']);
if (!$adm) {
    $_SESSION["admin"] = true;
    $orders = OrderAdm::allOrder();
    $types = TypeAdm::all();
    $products = ProductAdm::all();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/product/product.view.php";
} else {
    $_SESSION["admin"] = false;
    $_SESSION["error"] = "Такого админа не сущесвует или не верный пароль";
    header("Location: /app/admin/");
}
