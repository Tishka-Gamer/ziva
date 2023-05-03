<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; 
?>

<div>
<h1 class="view-text">Заказы</h1>
    <div class="sort">
        <?php foreach ($statuses as $status) : ?>
            <div class="form-check">
                <input value="<?= $status->status ?>" id="<?= $status->status ?>" class="form-check-input" type="checkbox" name="status">
                <label class="form-check-label" for="<?= $status->status ?>"><?= $status->status ?></label>
            </div>
        <?php endforeach ?>
    </div>
    <table>
        <thead>
            <tr>
            <th class="table-th">Номер заказа</th>
            <th class="table-th">покупатель</th>
            <th class="table-th">статус</th>
            <th class="table-th">создание</th>
            <th class="table-th">дата обновления</th>
            <th class="table-th">Фармацевт</th>
            </tr>
        </thead>
        <tbody class="products-container">
            
        </tbody>

    </table>
</div>
<script src="/app/admin/assets/js/loadOrder.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; 
?>