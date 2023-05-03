<?php
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

if(isset($_POST["del"])){
    User::delete($_POST["id"]);
}

header("location: /");