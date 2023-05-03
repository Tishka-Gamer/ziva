<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
use App\models\User;

// $_SESSION["login"] = $_POST["login"];
if(isset($_POST["btn"])){
 $user = User::getUser($_POST['number'], $_POST['password']);
 if($user != null){
    $_SESSION["auth"] = true;
    $_SESSION["id"] = $user->id;
    header("Location: /app/tables/users/profile.php");
 }else{
    $_SESSION["error"] = "Пользователь не найден";
    $_SESSION["auth"] = false;
    header("Location: /app/tables/users/auth.php");
    die();
   
   
 }
  
}



