<?php

use App\models\Category;
use App\models\Type;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$categories = Category::all();
$types = Type::all();
// $typs = Type::filter($category);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/categorys/category.view.php";