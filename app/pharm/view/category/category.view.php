<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/pharm/view/templates/header.php"; ?>
<div>
    <h1 class="view-text">Категории</h1>
    <div class="category-cont">
        <table class="table-category">
            <tr>
                <th class="table-th">Название категории</th>
            </tr>
            <?php foreach ($categories as $category) :?>
            <tr class="tr-body">
                <td class="table-td"><?= $category->name?></td>
                <td class="table-td"><a href="/app/pharm/tables/category/inType.php?id=<?=$category->id?>"><button class="tovar">Типы</button></a></td>
            </tr>
            <?php endforeach?>   
        </table>
    </div>
    
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>