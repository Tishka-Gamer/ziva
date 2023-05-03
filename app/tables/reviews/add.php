<?php
session_start();
use App\models\Review;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$product_id = $_POST['prod'];
$_SESSION['product_id'] = $product_id;
$text = $_POST['review'];
$badwords = ["хуй","пизд","далбо","долбо","уеб","хуе","хуя","пидо","пидр","оху","аху","залу","пезд","еба","еб"];
$pattern = "/\b[а-яё]*(".implode("|", $badwords).")[а-яё]*\b/ui";
$res = preg_replace($pattern, "ПЛОХОЕ СЛОВО", $_SESSION["content"]);

if ($res==$text) {
    $review = Review::add($text, $_SESSION["id"], $product_id);
} else{
    $_SESSION["bad"] = "неадекватный комментарий";
}

header("location: /app/tables/reviews/review.php");
// require_once $_SERVER["DOCUMENT_ROOT"] . '/views/reviews/review.view.php';