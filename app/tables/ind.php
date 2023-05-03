<?php

use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$tovars = Product::top();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/about.view.php";