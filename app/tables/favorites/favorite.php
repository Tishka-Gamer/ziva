<?php

use app\models\Favorite;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$user_id = $_SESSION["id"];
$favorites = Favorite::all($user_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/favorites/favorite.view.php";