<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
session_start();
use App\models\RewiewAdm;
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $rewiews = RewiewAdm::all();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/rewiew/rewiew.view.php";

}
