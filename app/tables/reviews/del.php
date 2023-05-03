<?php 

use App\models\RewiewAdm;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
$id = $_POST['id'];
RewiewAdm::del($id);
header("Location: /app/tables/rewiews/rewiew.user.php");