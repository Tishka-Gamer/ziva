<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="container">
    <h1 class="empty">По вашему запросу товары не найдены</h1>
    <form action="/app/tables/baskets/basketProd.php" method="post"><button>В корзину</button></form>
</div>
<!-- <script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.check.js"></script> -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>