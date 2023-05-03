<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";

use App\models\Address;

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $addresses = Address::all();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/address/address.view.php";
}
