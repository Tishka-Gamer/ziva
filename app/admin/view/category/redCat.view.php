<?php

use App\models\CategoryAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; 
$id = (int)$_GET["id"];
$category = CategoryAdm::findId($id);?>

<div>
    <form action="/app/admin/tables/category/reductCategory.php" class="category-form">
        <label for="Catname">Введите новое название</label>
        <input type="text" name="Catname" value="<?= $category->name?>">
        <input type="" name="id" value="<?=$id?>" style="display:none">
        <button>Ok</button>
    </form>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; 
var_dump($id) ;
?>