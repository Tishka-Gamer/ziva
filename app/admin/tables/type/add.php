<?php
session_start();

use App\models\CategoryAdm;

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
    $categories = CategoryAdm::all();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/type/add.view.php";
}
