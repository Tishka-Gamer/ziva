<?php
session_start();
use App\models\CategoryAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $category_id = $_GET['id'];
    CategoryAdm::reduct($_GET['id'], $_GET['Catname']);
    echo $_GET['id'];
    header("Location: /app/admin/tables/category/category.php");
}
