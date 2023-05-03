<?php

use App\models\Product;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
// if($_GET['categories'] !="all")
// {
    $categories = json_decode($_GET['categories']);
    if(count($categories) == 0)
    {
        $res = Product::all();
    }
    else
    {
        $res = Product::productsByManyCategories($categories);
    }
// }
echo json_encode($res, JSON_UNESCAPED_UNICODE);
