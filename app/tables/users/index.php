<?php

use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$users = User::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . '/views/users/index.view.php';