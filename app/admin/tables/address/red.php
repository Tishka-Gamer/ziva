<?php
session_start();

use App\models\Address;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $id = $_POST['id'];
    $name = $_POST['text'];
    Address::reduct($id, $name);
    header("Location: /app/admin/tables/address/address.php");
}
