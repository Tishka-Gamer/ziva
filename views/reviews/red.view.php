<?php

use App\models\RewiewAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
$rewiew = RewiewAdm::find($_POST['id']);?>

<div>
    <form action="/app/tables/reviews/red.php" method="post" class="red-view">
        <label for="text">Редактируйте</label>
        <textarea name="text" id="text" cols="50" rows="10"><?=$rewiew->text?></textarea>
        <input type="text" name="id" value="<?=$_POST["id"]?>" style="display:none">
        <button>Ok</button>
    </form>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>
// echo $_GET["id"];
?>