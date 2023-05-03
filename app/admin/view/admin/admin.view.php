<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; 
?>

<div>
    <h1 class="view-text">Админ</h1>
    <form action="/app/admin/view/admin/addAdm.view.php"><button>Создать админа</button></form>
    <br>
    <table class="table-category">
        <tr>
            <th class="table-th">Имя</th>
        </tr>
        <?php foreach ($admins as $admin) :?>
        <tr class="tr-body">
            <td class="table-td"><?= $admin->name?></td>
            <td class="table-td"><form action="/app/admin/tables/admin/delAdm.php"><button name="id" value="<?=$admin->id?>" class="delete">Удалить</button></form></td>
        </tr>
        <?php endforeach?>   
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>