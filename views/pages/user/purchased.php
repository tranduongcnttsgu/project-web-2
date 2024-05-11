<section class="user-container">
    <div class="container-left">
        <div class="sidebar-avatar">
            <div class="user-avatar">
                <img src="http://localhost/assets/Db_img/avatar-default.png" alt="" />
            </div>
            <div id="rootUserAvatar"></div>
        </div>
        <div class="sidebar close">

            <ul class="side-menu">
                <li titles="shop" key="0">
                    <span><i class="bx bx-store-alt"></i>Thông tin người dùng</span>
                </li>
                <li titles="static" key="1">
                    <span><i class="bx bx-analyse"></i>Đơn hàng</span>
                </li>
                <li titles="mes" key="2" class="active">
                    <span><i class="bx bx-group"></i>sản phẩm đã mua</span>
                </li>


            </ul>
            <ul class="side-menu">
                <li onclick="dispatch('user/logout',1)" class="logout-btn">
                    <span class="logout">
                        <i class="bx bx-log-out-circle"></i>
                        đăng xuất
                    </span>
                </li>
            </ul>
        </div>
        <?php

        use controllers\ProductController;

        require_once __DIR__ . "/nav.php";
        ?>
    </div>
    <div class="container-right">
        <ul class="list-product-purchased">
            <?php
            $pc = new ProductController();
            $orders = $pc->usergetListProductPurchased();

            if ($orders === false) {
            ?>
                <div class="no-product-wrapper">
                    <h3 class="no-product-title">chưa có sản phẩm nào</h3>
                    <img src="http://localhost/assets/Db_img/no-product.webp" alt="">
                </div>
                <?php } else {
                foreach ($orders as $key => $order) {
                    foreach ($order["orderDetail"] as $key => $product) {
                ?>
                        <li class="listProduct-item-product">
                            <div class="listProduct-product">
                                <img src="http://localhost/assets/Db_img/<?php echo $product["product_image"] ?>" alt="" />
                                <div class="content-product">
                                    <span class="product-star"><i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                    <h2 class="product-title">
                                        <?php
                                        echo $product["product_name"];
                                        ?>
                                    </h2>
                                    <h2 class="product-price">
                                        <span class="sell-price">
                                            <?php echo  number_format($product["price"] * 1000, 0, '', ','); ?>đ
                                        </span>
                                        <span class="current-price">
                                            <?php echo  number_format($product["price"] * 1000, 0, '', ','); ?>đ
                                        </span>
                                    </h2>
                                    <div class="product-option">
                                        <div class="product-option-top">
                                            <div class="like-product">
                                                <span> <i class="fa-regular fa-heart"></i></span>
                                            </div>
                                            <div class="detail-product" onclick='dispatch("user/detailProduct","<?php echo $product["product_id"] ?>")'>
                                                <span><i class="fa-regular fa-eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="product-option-bottom">
                                            <button class="product-option-button" onclick='dispatch("user/addProduct","<?php echo $product["product_id"] ?>")'>
                                                <i class="fa-solid fa-cart-shopping"></i> thêm vào giỏ
                                                hảng
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
            <?php }
                }
            } ?>
        </ul>






    </div>
</section>


<script type="module" src="http://localhost/assets/js/userSlice/index.js"></script>