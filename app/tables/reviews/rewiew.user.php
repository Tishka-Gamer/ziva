<?php
session_start();
use App\models\Review;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$reviews = Review::findUser($_SESSION["id"]);

// header("location: /app/tables/reviews/review.php");
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/reviews/rewUser.view.php';