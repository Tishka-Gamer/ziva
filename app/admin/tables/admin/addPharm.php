<?php

use App\models\Admin;

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    if ($_POST['name'] == "" && $_POST['password'] == "") {
        $_SESSION['error'] = "не заполнены данные";
        header("Location: /app/admin/view/admin/addPh.view.php");
    } else {
        if (Admin::searchPh($_POST['name'])) {
            Admin::addPharmaceft($_POST['name'], $_POST['password']);
            header("Location: /app/admin/tables/admin/tablePh.php");
        } else {
            $_SESSION['error'] = "такой админ уже существует";
            header("Location: /app/admin/view/admin/addPh.view.php");
        }
    }
}
