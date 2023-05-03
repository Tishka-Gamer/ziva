<?php
session_start();
use App\models\RewiewAdm;

if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
    $id = $_GET['id'];
    RewiewAdm::del($id);
    header("Location: /app/admin/tables/rewiew/rewiew.php");
}
