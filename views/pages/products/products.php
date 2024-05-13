<style>
    .main-product {
        max-width: 1200px;
        width: 100%;
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

    @media screen and (max-width:1020px) {
        .container-right {
            width: max-content;
        }

        .pagination-wrap {
            width: 100%;
        }

        h2 {
            font-size: clamp(0.625rem, 0.4948rem + 0.6944vw, 0.9375rem);
        }
    }

    @media screen and (max-width:720px) {
        .conaienr-left {
            max-width: 200px;
            width: 100%;
            min-width: 150px;
        }
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