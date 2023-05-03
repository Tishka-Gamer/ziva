<?php
session_start();
use App\models\CategoryAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
}else{
    $categories = CategoryAdm::all();
    require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/view/category/category.view.php";
}
