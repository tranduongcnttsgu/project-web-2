<main>
    <section site="managerOrder" class="main-container
<?php

use controllers\ProductController;

if (isset($show)) {
    echo $show;
}
?>">
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày tạo</th>
                        <th>Người mua</th>
                        <th>thông tin </th>
                        <th>trạng thái</th>
                        <th>thanh toán</th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody>
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
                                echo  date("H:i:s   \\n\g\à\y d-m-Y", $timestamp);
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
                                    <div class="info-quantity">số lượng sản phẩm:
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