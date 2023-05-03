<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; 
?>

<div>
    <h1 class="view-text">Фармацевты</h1>
    <form action="/app/admin/view/admin/addPh.view.php"><button>Создать фармацевта</button></form>
    <br>
    <table class="table-category ">
        <tr>
            <th class="table-th">Имя</th>
        </tr>
        <?php foreach ($pharms as $pharm) :?>
        <tr class="tr-body">
            <td class="table-td"><?= $pharm->name?></td>
            <td class="table-td"><form action="/app/admin/tables/admin/delPharm.php"><button name="id" value="<?=$pharm->id?>" class="delete">Удалить</button></form></td>
        </tr>
        <?php endforeach?>   
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>