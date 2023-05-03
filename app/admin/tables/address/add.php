<?php

use App\models\Address;

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    if ($_POST['name'] == "") {
        $_SESSION['error'] = "не заполнены данные";
    } else {
        if (Address::find($_POST['name'])) {
            Address::add($_POST['name']);
        } else {
            $_SESSION['error'] = "такой адрес уже есть";
        }
    }
    header("Location: /app/admin/tables/address/address.php");
}
