<style>
    .main-product {
        width: 1200px;
        display: flex;
        margin: 0 auto;
        margin-top: 10px;
    }

    .conaienr-left {
        width: 240px;
        min-width: 240px;
        border: 1px solid black;
        background-color: white;
        border-radius: 10px;
        padding: 10px;
        margin-right: 10px;
    }

    .container-right {
        width: 100%;
    }
</style>
<main class="main-product">
    <div class="conaienr-left">
        <?php
        require_once __DIR__ . "/../../components/filterProduct.php";
        ?>
    </div>
    <div class="container-right">
        <?php

        require_once __DIR__ . "/../../components/listProduct.php";
        ?>
    </div>

    </div>


</main>
<?php
require_once __DIR__ . "/../../components/pagination.php";
?>
<script type="module" src="http://localhost/assets/js/userSlice/index.js"></script>