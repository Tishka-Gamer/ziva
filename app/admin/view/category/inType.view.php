<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; ?>
<div>
    <h1 class="view-text"><?= $category->name?></h1>
    <div class="table">
        <table class="table-category">
            <tr>
                <th class="table-th">Картинка</th>
                <th>Название</th>
            </tr>
            <tr class="tr-body"><?php foreach($types as $type) :?>
                <td class="table-td"><img src="/upload/<?=$type->image ?>" style="width: 80px; height: 80px;" alt="<?=$type->image ?>"></td>
                <td class="table-td"><?=$type->name ?></td>
            </tr><?php endforeach?>
        </table>
    </table>
</div>