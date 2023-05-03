<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; ?>
<div>
    <h1 class="view-text">Адреса</h1>
    <form action="/app/admin/tables/address/add.php" method="POST">
        <label for="name">Введите адрес</label>
        <input type="text" name="name" size="15" pattern="/^[А-Я]{1}[a-я]{1,50}\s[у]{1}[л]{1}\.\,\s[д]\.\s[1-9]{1,3}$/gmu" required>
        <button class="addCat">добавить</button>
        <p><?=$_SESSION['error'] ?? "" ?></p>
    </form>
    <table class="table-category">
        <tr>
            <th class="table-th">адрес</th>
        </tr>
        <?php foreach ($addresses as $address) :?>
        <tr class="tr-body">
            <td class="table-td"><?= $address->name?></td>
            <td class="table-td"><a href="/app/admin/tables/address/del.php?id=<?=$address->id?>"><button class="delete">Удалить</button></a></td>
            <td class="table-td"><a href="/app/admin/view/address/red.view.php?id=<?=$address->id?>"><button class="edit">Редактировать</button></a></td>
        </tr>
        <?php endforeach?>   
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php';
unset($_SESSION['error']) ?>