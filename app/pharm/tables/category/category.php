<?php
session_start();
use App\models\CategoryAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
}else{
    $categories = CategoryAdm::all();
    require_once $_SERVER["DOCUMENT_ROOT"]."/app/pharm/view/category/category.view.php";
}
