<?php 
session_start();
use App\models\Review;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$id = $_POST['id'];
$text = $_POST['text'];
$badwords = ["хуй","пизд","далбо","долбо","уеб","хуе","хуя","пидо","пидр","оху","аху","залу","пезд","еба","еб"];
$pattern = "/\b[а-яё]*(".implode("|", $badwords).")[а-яё]*\b/ui";
$res = preg_replace($pattern, "ПЛОХОЕ СЛОВО", $_SESSION["content"]);

if ($res==$text) {
    $review = Review::reduct($text, $id);
} else{
    $_SESSION["bad"] = "неадекватный комментарий";
}
header("Location: /app/tables/reviews/review.view.php");


