<?php

use app\models\Order;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user_id = $_SESSION["id"];
$orders = Order::findInUser($user_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/orders/allOrder.view.php";