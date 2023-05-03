<?php



session_start();
use app\models\Order;
use App\models\Product;
use App\models\Review;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$product_id = $_SESSION['product_id'];
$reviews = Review::rewProd($product_id);
$product = Product::find($product_id);
if(isset($_SESSION["id"]))
{
    $userRev = Order::findUser($_SESSION["id"], $product_id);
    
}
if(isset($userRev))
{
    if($userRev) {
        $reviews = Review::rewProdNotUser($_SESSION["id"], $product_id);
        $otz = Review::rewUser($_SESSION["id"], $product_id);
    }
    
}


require_once $_SERVER["DOCUMENT_ROOT"] . '/views/reviews/review.view.php';