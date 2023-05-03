<?php

use App\models\Address;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php";
$address = Address::search($_GET['id']);?>

<div>
    <form action="/app/admin/tables/address/red.php" method="post">
        <label for="text">Редактируйте</label>
        <textarea name="text" id="text" cols="40" rows="1"><?=$address->name?></textarea>
        <input type="text" name="id" value="<?=$_GET["id"]?>" style="display:none">
        <button>Ok</button>
    </form>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; 
// echo $_GET["id"];
?>