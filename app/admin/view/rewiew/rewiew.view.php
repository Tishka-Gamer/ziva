<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; ?>
<div>
    <h1 class="view-text">Отзывы</h1>
    <table class="category-cont">
        <tr>
            <th class="table-th">Пользователь</th>
            <th class="table-th">Продукт</th>
            <th class="table-th">Текст</th>
        </tr>
        <?php foreach ($rewiews as $rewiew) :?>
        <tr class="tr-body">
            <td class="table-td"><?= $rewiew->user?></td>
            <td class="table-td"><?= $rewiew->product?></td>
            <td class="table-td"><?= $rewiew->text?></td>
            <td class="table-td"><a href="/app/admin/tables/rewiew/del.php?id=<?=$rewiew->id?>"><button class="delete">Удалить</button></a></td>
            <td class="table-td"><a href="/app/admin/view/rewiew/red.view.php?id=<?=$rewiew->id?>"><button class="edit">Редактировать</button></a></td>
        </tr>
        <?php endforeach?>   
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>