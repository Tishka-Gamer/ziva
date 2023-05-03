<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/view/templates/header.php"; ?>
<div>
    <h1 class="view-text">Изменение статуса</h1>
    <form action="/app/admin/tables/order/reductStatus.php">
        <select name="status_id">
            <?php foreach ($statuses as $status) : ?>
                <option <?= $status->status == $_SESSION['status_id']? "selected":""?> value="<?= $status->status ?>"><?= $status->status ?></option>
            <?php endforeach ?>
        </select>
        <button name="status" value="<?= $status->status ?>">Окей</button>
    </form>
</div>