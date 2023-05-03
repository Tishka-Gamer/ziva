<?php
session_start();
use App\models\CategoryAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    CategoryAdm::addCategory($_POST['Catname']);
    // require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/category/category.view.php";
    header("Location: /app/admin/tables/category/category.php");
}
