<?php

use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$categories = Category::all();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/index.view.php";