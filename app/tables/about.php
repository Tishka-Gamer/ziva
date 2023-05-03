<?php

use app\models\Things;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$addresses = Things::addresses();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/about.view.php";
