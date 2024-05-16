<main>
    <section site="managerOrder" class="main-container
<?php

use controllers\ProductController;

if (isset($show)) {
    echo $show;
}
?>">
        <h3 style="padding: 10px;">Quản lý đơn hàng</h3>
        <div class="manager-order-navbar">
            <h3 class="manager-order-title">Sắp xếp đơn hàng theo:</h3>
            <ul class="manager-order-sort">
                <li class="manager-order-button" data-sort="0">
                    Tất cả
                </li>
                <li class="manager-order-button" data-sort="1">
                    Đơn hàng chở sử lý
                </li>
                <li class="manager-order-button" data-sort="2">
                    Đơn hàng đang giao
                </li>
                <li class="manager-order-button" data-sort="3">
                    Đơn hàng đã thanh toán
                </li>
                <li class="manager-order-button" data-sort="4">
                    Đơn hàng đã giao
                </li>
                <li class="manager-order-button" data-sort="5">
                    Đơn hàng bị hủy
                </li>
            </ul>
        </div>
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày tạo</th>
                        <th>Người mua</th>
                        <th>Thông tin </th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody id="table-show-order">
                    <?php
                    $pc =  new ProductController();
                    $orders = $pc->adminGetOrders();
                    $count  = 0;
                    foreach ($orders as $key => $value) :

                    ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="pcs">
                                <?php
                                $timestamp = strtotime($value["order"]["order_date"]);
                                echo  date("H:i:s   \\N\g\à\y d-m-Y", $timestamp);
                                ?>
                            </td>
                            <td class="cur">
                                <div class=" info-customer-wrapper">
                                    <div class="info-name"> <?php echo $value["customer"]["name"]; ?></div>
                                    <div class="info-std"><?php echo $value["customer"]["phone"]; ?></div>
                                    <div class="info-email"><?php echo $value["customer"]["email"]; ?></div>
                                </div>
                            </td>
                            <td class="per">
                                <div class="info-order-wrapper">
                                    <div class="info-order-price">
                                        Tổng tiền đơn hàng:
                                        <?php echo  number_format($value["order"]["totail_price"] * 1000, 0, '', ','); ?></div>
                                    <div class="info-quantity">Số lượng sản phẩm:
                                        <?php echo $value["order"]["totail_product"]; ?>
                                    </div>
                                </div>
                            </td>
                            </td>
                            <td class="per"><?php echo $value["order"]["message_status"]; ?></td>
                            <td class="per"><?php echo $value["order"]["message_status_payment"]; ?></td>
                            <td class="per">
                                <button class="button-action-order" id="button-action-order" data-order="<?php echo $value["order"]["order_id"]; ?>">thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>
    </section>
</main>