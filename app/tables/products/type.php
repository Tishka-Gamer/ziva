<?php
use App\models\Product;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if($_POST['id'] != "")
{
    $type = $_POST['id'];
}

if($_SESSION['type'] == "")
{
    $_SESSION['type'] = $type;
}

$name = Product::findTypes($_SESSION['type']);
$conts = Product::conts($_SESSION['type']);
$tovars = Product::findType($_SESSION['type']);
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/product.view.php";