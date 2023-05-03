<?php
session_start();
use App\models\CategoryAdm;
use App\models\TypeAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["pharm"]) {
    header("Location: /");
} else {
    $category_id = $_GET['id'];
    $category = CategoryAdm::findId($category_id);
    $types = TypeAdm::filter($category_id);
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/category/inType.view.php";
}

// header("Location: /app/admin/tables/category/category.php");