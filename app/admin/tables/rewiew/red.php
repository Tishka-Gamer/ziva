<?php
session_start();
use App\models\RewiewAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $id = $_POST['id'];
    $text = $_POST['text'];
    RewiewAdm::reduct($id, $text);
    header("Location: /app/admin/tables/rewiew/rewiew.php");
}
