<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use app\models\Order;

session_start();
$address = "";
$user_id = $_SESSION["id"];
if($_POST['radio'] == 0)
{
    $address = $_POST['address'];
}
elseif($_POST['radio'] == 1)
{
    $address = $_POST['ddost'];
}
// var_dump($_POST) ;
// $user = User::find($user_id);
// $addresses = Things::addresses();
Order::create($user_id, $address);
// require_once $_SERVER["DOCUMENT_ROOT"] . "/views/orders/order.view.php";
header('location: /app/tables/orders/all.php');