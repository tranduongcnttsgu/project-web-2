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
                <li titles="shop" class="" key="0">
                    <span><i class="bx bx-store-alt"></i>Thông tin người dùng</span>
                </li>
                <li titles="static" class="active" key="1">
                    <span><i class="bx bx-analyse"></i>Đơn hàng</span>
                </li>
                <li titles="mes" key="2">
                    <span><i class="bx bx-group"></i>sản phẩm đã mua</span>
                </li>
                <li titles="user" key="3">
                    <span><i class="bx bx-group"></i>sản phẩm yêu thích</span>
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



        <main class="user-order-main">
            <div class="order-main-wrapper">
                <h2 class="main-title">đơn hàng của tôi</h2>
                <ul class="list-order-detail" id="container-list-order">

                    <?php
                    $pc  = new ProductController();
                    $Orders = $pc->userGetOrders();
                    foreach ($Orders as $key => $value) :
                    ?>
                        <li class="item-order-detail">
                            <div class="item-order-title-wrapper">
                                <h5 class="order-detail-status-title">
                                    <i class="fa-regular fa-bell"></i>
                                    trạng thái: <span class="">
                                        <?php echo  $value["order"]["message_status"] ?>
                                    </span>

                                </h5>
                                <h5 class="order-detail-status-title">
                                    <i class="fa-regular fa-bell"></i>
                                    Ngày đặt hàng: <span class="">
                                        <?php echo  $value["order"]["order_date"] ?>
                                    </span>

                                </h5>
                            </div>

                            <div class="list-order-detail-wrapper">

                                <?php
                                foreach ($value["orderDetail"] as $key => $product) :
                                ?>
                                    <div class="item-order-detail-content-wrapper">
                                        <img src="http://localhost/assets/Db_img/<?php
                                                                                    echo $product["product_image"];
                                                                                    ?>" alt="" class="img-order-detail" />
                                        <div class="content-order-detail">
                                            <div class="content-order-detail-name">
                                                <?php
                                                echo  $product["product_name"];
                                                ?> x
                                                <span style="color:red;">
                                                    <?php
                                                    echo  $product["quantity"];
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="content-order-detail-price">
                                                <?php echo  number_format($product["totail_price"] * 1000, 0, '', ','); ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                            <div class="status-order-detail">
                                <div style="width:400px; height:100%;
                  display:flex;   flex-direction: column;
                  row-gap:5px;
                   
                   
                  
                 ">
                                    <div>tổng tiền đã thanh toán:
                                        <?php
                                        if (strcmp($value["order"]["status_payment"], "1") === 0) {
                                            echo    number_format($value["order"]["totail_price"] * 1000, 0, '', ',');
                                        } else {
                                            echo "0đ";
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        tổng tiền đơn hàng:
                                        <?php

                                        echo    number_format($value["order"]["totail_price"] * 1000, 0, '', ',');

                                        ?>
                                    </div>
                                </div>
                                <div>
                                    <?php
                                    if (strcmp($value["order"]["status_stransport"], "-1") !== 0) :
                                    ?>
                                        <?php
                                        if (strcmp($value["order"]["status_stransport"], "0") === 0) :
                                        ?>
                                            <button class="btn-status order-delete" data-order='<?php echo $value["order"]["order_id"];  ?>' id="button-delete-order-user">hủy đơn hàng</button>
                                        <?php endif; ?>
                                        <?php
                                        if (strcmp($value["order"]["status_stransport"], "0") === 0  && strcmp($value["order"]["status_stransport"], "0") !== 0) :
                                        ?>
                                            <button class="btn-status order-payment" data-order='<?php echo $value["order"]["order_id"];  ?>' id="button-payment-order-user">thanh toán đơn hàng</button>
                                        <?php endif; ?>

                                        <?php
                                        if ($value["order"]["status_stransport"] === 2) :
                                        ?>
                                            <button class="btn-status received "> đơn hàng đã được giao</button>
                                        <?php endif; ?>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </main>


    </div>
</section>


<script type="module" src="http://localhost/assets/js/userSlice/index.js"></script>