<?php
session_start();
unset($_SESSION['error']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
use App\models\Admin;
if (!$_SESSION["admin"]) {
    header("Location: /");
}
else {
    $admins = Admin::allAdmin();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/admin/admin.view.php";
}
