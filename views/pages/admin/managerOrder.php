<style>
    .section {
        padding: 20px;
    }

    /* Statistical Order Section */
    .order-statistical {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .order-statistical-item {
        width: 30%;
        display: flex;
        align-items: center;
    }

    .order-statistical-item-content {
        flex-grow: 1;
    }

    .order-statistical-item-content-desc {
        margin-bottom: 5px;
        font-size: 14px;
        color: #888;
    }

    .order-statistical-item-icon i {
        font-size: 36px;
        color: var(--red);
    }

    /* Table Styles */
    .table {
        margin-bottom: 30px;
        overflow-x: auto;
    }

    .table table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: center;
        white-space: nowrap;
        border-bottom: 1px solid var(--lighter-gray);
    }

    .table thead th {
        font-size: 14px;
        font-weight: bold;
        background-color: var(--lighter-gray);
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }

    /* Button Styles */
    button[name^="sort_"] {
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    button[name^="sort_"]:hover {
        color: var(--red);
    }

    /* Detail Order */
    .admin-control {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        flex-wrap: wrap;
        align-items: center;
    }

    /* Dropdown */
    #the-loai-tk {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 150px;
    }

    .admin-control-center {
        flex: 1;
    }

    .admin-control-right {
        display: flex;
    }

    .admin-control-right button {
        width: 40px;
        margin-left: 10px;
        border-radius: 5px;
    }

    .admin-control-right button:hover {
        background-color: var(--red);
        color: #fff
    }

    .form-search {
        display: flex;
        justify-content: center;
    }

    .search-btn {
        border: none;
        outline: none;
        font-size: 20px;
        height: 40px;
        padding: 0 15px;
        color: var(--text-color);
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
    }

    .form-search-input {
        height: 40px;
        outline: none;
        border: none;
        background-color: #f0f0f0;
        padding: 10px 20px;
        padding-left: 0;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        width: 75%;
    }

    .fillter-date {
        display: flex;
    }

    .fillter-date>div:first-child {
        margin-right: 20px;
    }

    .fillter-date>div>label {
        margin-right: 10px;
        font-size: 15px;
    }

    #tinh-trang,
    .form-control-date {
        background-color: #eee;
        border: none;
        outline: none;
        padding: 10px 20px;
        border-radius: 5px;
        height: 40px;
    }


    .order-statistical {
        display: flex;
        margin: 30px 0;
        column-gap: 20px;
    }

    .order-statistical-item {
        box-shadow: 0px 1px 5px 2px #f1f1f1;
        width: 32.1%;
        display: flex;
        padding: 20px 40px;
        align-items: center;
        justify-content: space-between;
    }

    .order-statistical-item-icon i {
        font-size: 45px;
        margin-right: 25px;
        color: var(--red);
    }

    .order-statistical-item-content-desc {
        margin-bottom: 6px;
        font-size: 14px;
        color: #888
    }

    table {
        border-collapse: collapse;

    }

    tr {
        border-bottom: 1px solid var(--lighter-gray);
        color: #000;

    }

    thead td {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 500;
        background: var(--lighter-gray);
        padding: 15px;
        text-align: center;
        white-space: nowrap;
    }

    tbody tr td {
        padding: 10px 15px;
        text-align: center;
        white-space: nowrap;
    }

    h1 {
        font-size: 24px;
        /* Kích thước font chữ */
        font-weight: bold;
        /* Độ đậm của font chữ */
        color: #333;
        /* Màu chữ */
        text-align: left;
        /* Căn giữa nội dung */
        margin-bottom: 10px;
        /* Khoảng cách phía dưới */
    }

    .section.active {
        padding: 20px;
    }

    /* Detail Order */
    .admin-control {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        flex-wrap: wrap;
        align-items: center;
    }

    .admin-control-center {
        flex: 1;
    }

    .admin-control-right {
        display: flex;
    }

    .admin-control-right button {
        width: 40px;
        margin-left: 10px;
        border-radius: 5px;
    }

    .admin-control-right button:hover {
        background-color: var(--red);
        color: #fff
    }

    .form-search {
        display: flex;
        justify-content: center;
    }

    .search-btn {
        border: none;
        outline: none;
        font-size: 20px;
        height: 40px;
        padding: 0 15px;
        color: var(--text-color);
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
    }

    .form-search-input {
        height: 40px;
        outline: none;
        border: none;
        background-color: #f0f0f0;
        padding: 10px 20px;
        padding-left: 0;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        width: 75%;
    }

    .fillter-date {
        display: flex;
    }

    .fillter-date>div:first-child {
        margin-right: 20px;
    }

    .fillter-date>div>label {
        margin-right: 10px;
        font-size: 15px;
    }

    #tinh-trang,
    .form-control-date {
        background-color: #eee;
        border: none;
        outline: none;
        padding: 10px 20px;
        border-radius: 5px;
        height: 40px;
    }
</style>

<main>
    <section site="managerOrder" class="main-container
<?php

use controllers\ProductController;

if (isset($show)) {
    echo $show;
}
?>">
        <h3 style="padding: 10px;">Quản lý đơn hàng</h3>
        <div class="admin-control">
            <div class="admin-control-center">
                <form method="GET" action="" class="form-search">
                    <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                    <input type="text" id="search_input" name="search_input" class="form-search-input" placeholder="Nhập tên hoặc mã sản phẩm...">
                </form>
            </div>
            <div class="admin-control-right">
                <form method="GET" action="" class="fillter-date">
                    <div>
                        <label for="from_date">Từ ngày:</label>
                        <input type="date" id="from_date" class="form-control-date" name="from_date">
                    </div>
                    <div>
                        <label for="to_date">Đến ngày:</label>
                        <input type="date" id="to_date" class="form-control-date" name="to_date">
                    </div>
                    <input type="submit" value="Lọc" name="Lọc">
                </form>
            </div>
        </div>
        <div class="manager-order-navbar">
            <h3 class="manager-order-title">Sắp xếp đơn hàng theo:</h3>
            <ul class="manager-order-sort">
                <li class="manager-order-button" data-sort="0">
                    Tất cả
                </li>
                <li class="manager-order-button" data-sort="1">
                    Đơn hàng chờ sử lý
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
                <li class="filter-sort-date" data-sort="6">
                    <input type="date" name="" id="date-start" value="null">
                    <span> đến</span>
                    <input type="date" name="" id="date-end" value="null">
                    <span style="
                      padding: 0 5px;
                     " id="filter-by-date"><i class="fa-solid fa-magnifying-glass"></i></span>
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