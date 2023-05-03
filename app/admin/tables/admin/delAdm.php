<?php
session_start();

use App\models\Admin;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $id = $_GET['id'];
    Admin::delAdmin($id);
    header("Location: /app/admin/tables/admin/tableAdm.php");
}
