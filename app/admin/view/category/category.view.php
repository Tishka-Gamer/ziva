<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; ?>
<div>
    <h1 class="view-text">Категории</h1>
    <div class="category-cont">
        <form action="/app/admin/tables/category/addCategory.php" method="POST">
            <label for="name">Введите название категории</label>
            <input type="text" name="Catname" size="15">
            <button class="addCat">добавить категорию</button>
        </form>
        <table class="table-category">
            <tr>
                <th class="table-th">Название категории</th>
            </tr>
            <?php foreach ($categories as $category) :?>
            <tr class="tr-body">
                <td class="table-td"><?= $category->name?></td>
                <td class="table-td"><a href="/app/admin/tables/category/delCategory.php?id=<?=$category->id?>"><button class="delete">Удалить</button></a></td>
                <td class="table-td"><a href="/app/admin/view/category/redCat.view.php?id=<?=$category->id?>"><button class="edit">Редактировать</button></a></td>
                <td class="table-td"><a href="/app/admin/tables/category/inType.php?id=<?=$category->id?>"><button class="tovar">Типы</button></a></td>
            </tr>
            <?php endforeach?>   
        </table>
    </div>
    
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>