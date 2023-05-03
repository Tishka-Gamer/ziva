<?php 
use App\models\Product;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$product = Product::find($_POST["id"]);
$conts = Product::conts($_POST["id"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/show.view.php";