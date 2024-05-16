<main>
    <section site="managerOrder" class="main-container
<?php

use controllers\ProductController;

if (isset($show)) {
    echo $show;
}
?>">
        <h3 style="padding: 10px;">Quản lý nhập hàng</h3>
        <div class="button-action-wrapper">
            <a href="http://localhost/admin/product/addNew" id="button-manager-product-add-new">

                <div class="product-button-action"><i class="fa-regular fa-square-plus"></i><span style="padding-left: 5px;">Thêm sản phẩm</span></div>
            </a>
        </div>
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày tạo</th>
                        <th>Nhà cung cấp</th>
                        <th>Thông tin </th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody id="table-show-order">
                    <?php
                    $pc =  new ProductController();
                    $imports = $pc->adminGetImports();
                    $count  = 0;
                    foreach ($imports as $key => $value) :

                    ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="pcs">
                                <?php
                                $timestamp = strtotime($value["import"]["import_date"]);
                                echo  date("H:i:s   \\N\g\à\y d-m-Y", $timestamp);
                                ?>
                            </td>
                            <td class="cur">
                                <div class=" info-customer-wrapper">
                                    <div class="info-name"> <?php echo $value["supplier"]["name"]; ?></div>
                                </div>
                            </td>
                            <td class="per">
                                <div class="info-order-wrapper">
                                    <div class="info-order-price">
                                        Tổng tiền nhập hàng:
                                        <?php echo  number_format($value["import"]["total_price"] * 1000, 0, '', ','); ?></div>
                                    <div class="info-quantity">Số lượng sản phẩm:
                                        <?php echo $value["import"]["total_product"]; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="per">
                                <button class="button-action-import" id="button-action-import" data-order="<?php echo $value["import"]["import_id"]; ?>">Thao tác<i class="fa-solid fa-pen-to-square"></i></button>
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