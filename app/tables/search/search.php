<?php
session_start();
use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$tovars = Product::search($_POST['search']);

if(empty($tovars)){
    require_once $_SERVER["DOCUMENT_ROOT"] . '/views/search/empty.view.php';
}
else {
    require_once $_SERVER["DOCUMENT_ROOT"] . '/views/search/search.view.php';
}

// header("location: /app/tables/reviews/review.php");
