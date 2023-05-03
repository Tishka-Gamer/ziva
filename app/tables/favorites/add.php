<?php

use app\models\Favorite;
use App\models\Product;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$product_id = $_POST['product_id'];
$_SESSION['product_id'] = $product_id;
$user_id = $_SESSION["id"];

Favorite::add($product_id, $user_id);
header("location: /app/tables/products/type.php");