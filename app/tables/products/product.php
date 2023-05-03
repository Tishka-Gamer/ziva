<?php
session_start();
use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$type = $_SESSION['name'];
$tovars = Product::findType($_SESSION['type']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/product.view.php";