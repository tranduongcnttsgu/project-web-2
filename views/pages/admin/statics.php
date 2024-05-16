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

<?php
include 'connect.php';
$conn = DbConnect::getInstance();

$query = "SELECT * FROM orders_detail"; // Thay đổi tên bảng nếu cần
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

function vnds($price)
{
    return number_format($price, 0, '', '.') . ' VND';
}
$queryProductsSold = "SELECT COUNT(DISTINCT product_id) AS total_products_sold FROM orders_detail";
$resultProductsSold = $conn->query($queryProductsSold);
$rowProductsSold = $resultProductsSold->fetch_assoc();
$totalProductsSold = $rowProductsSold['total_products_sold'];

// Tính tổng số lượng sản phẩm đã bán ra
$queryQuantityOrder = "SELECT SUM(quantity) AS total_quantity_sold FROM orders_detail";
$resultQuantityOrder = $conn->query($queryQuantityOrder);
$rowQuantityOrder = $resultQuantityOrder->fetch_assoc();
$totalQuantitySold = $rowQuantityOrder['total_quantity_sold'];

// Tính tổng doanh thu
$queryTotalRevenue = "SELECT SUM(totail_price) AS total_revenue FROM orders_detail";
$resultTotalRevenue = $conn->query($queryTotalRevenue);
$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
$totalRevenue = $rowTotalRevenue['total_revenue'];
?>
<main>
    <div class="section active">
        <div class="section">
            <h1>Thống kê sản phẩm</h1>
            <div class="order-statistical" id="order-statistical">
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-product"><?php echo $totalProductsSold; ?></h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-light fa-salad"></i>
                    </div>
                </div>
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-order"><?php echo $totalQuantitySold; ?></h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-light fa-file-lines"></i>
                    </div>
                </div>
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Doanh thu</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-sale"><?php echo vnds($totalRevenue); ?></h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-light fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
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
                            <input type="submit" value="Lọc" name="Lọc">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.table-responsive -->
            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>
                                <span>Mã Sách</span>
                            </td>
                            <td>
                                <span>Tên Sách</span>
                                <button type="button" class="sort-button" data-column="product_name" data-order="asc">&#9650;</button> <!-- Nút sắp xếp A-Z -->
                                <button type="button" class="sort-button" data-column="product_name" data-order="desc">&#9660;</button> <!-- Nút sắp xếp Z-A -->
                            </td>
                            <td>
                                <span>Lượt Mua</span>
                                <button type="button" class="sort-button" data-column="total_quantity" data-order="asc">&#9650;</button> <!-- Nút sắp xếp tăng dần -->
                                <button type="button" class="sort-button" data-column="total_quantity" data-order="desc">&#9660;</button> <!-- Nút sắp xếp giảm dần -->
                            </td>
                            <td>
                                <span>Doanh thu</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody id="product_table_body">
                        <?php
                        $columns = array('product_id', 'product_name', 'total_quantity', 'total_revenue');
                        $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                        $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

                        // Lấy ngày bắt đầu và kết thúc từ biểu mẫu
                        $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : null;
                        $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : null;

                        // Thêm điều kiện vào câu truy vấn SQL để lọc theo khoảng thời gian nếu có ngày bắt đầu và kết thúc được chọn
                        $date_condition = "";
                        if ($from_date && $to_date) {
                            $date_condition = "AND od.create_at BETWEEN '$from_date' AND '$to_date'";
                        }

                        // Xử lý dữ liệu từ form tìm kiếm
                        $search_input = isset($_GET['search_input']) ? $_GET['search_input'] : '';
                        $search_condition = "";
                        if ($search_input != '') {
                            $search_condition = "AND (p.name LIKE '%$search_input%' OR od.product_id LIKE '%$search_input%')";
                        }

                        $result = $conn->query("SELECT od.product_id, p.name AS product_name, SUM(od.quantity) AS total_quantity, SUM(od.totail_price) AS total_revenue
                                                    FROM orders_detail AS od
                                                    INNER JOIN products AS p ON od.product_id = p.product_id
                                                    WHERE 1 $date_condition $search_condition
                                                    GROUP BY od.product_id
                                                    ORDER BY $column $sort_order");

                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            // Duyệt từng dòng dữ liệu
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["product_id"] . "</td>"; // In ra mã sản phẩm
                                echo "<td>" . $row["product_name"] . "</td>"; // In ra tên sản phẩm
                                echo "<td>" . $row["total_quantity"] . "</td>"; // In ra số lượng đã bán
                                echo "<td>" . vnds($row["total_revenue"]) . "</td>"; // In ra doanh thu
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không có sản phẩm nào được tìm thấy trong khoảng thời gian và điều kiện tìm kiếm đã chọn.</td></tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <h1>Thống kê theo tháng</h1>
            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tháng/Năm</th>
                            <th>Số lượng hóa đơn</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) && isset($_GET['ngaysau']) && !empty($_GET['ngaysau'])) {
                            $ngaytruoc = $_GET['ngaytruoc'];
                            $ngaysau = $_GET['ngaysau'];

                            $queryDT = mysqli_query($conn, "SELECT *, MONTH(o.order_date) AS month, YEAR(o.order_date) AS year, COUNT(o.order_id) AS total_orders, SUM(od.totail_price) AS total_revenue
                                        FROM orders AS o
                                        INNER JOIN orders_detail AS od ON o.order_id = od.order_id
                                        WHERE MONTH(o.order_date) BETWEEN MONTH('$ngaytruoc') AND MONTH('$ngaysau')
                                        AND YEAR(o.order_date) BETWEEN YEAR('$ngaytruoc') AND YEAR('$ngaysau')
                                        GROUP BY MONTH(o.order_date)");
                        } else {
                            $queryDT = mysqli_query($conn, "SELECT *, MONTH(o.order_date) AS month, YEAR(o.order_date) AS year, COUNT(o.order_id) AS total_orders, SUM(od.totail_price) AS total_revenue
                                        FROM orders AS o
                                        INNER JOIN orders_detail AS od ON o.order_id = od.order_id
                                        GROUP BY MONTH(o.order_date)");
                        }

                        $i = 0;

                        if ($queryDT) {
                            while ($dataDoanhThu = mysqli_fetch_array($queryDT)) {
                                $i++;
                        ?>
                                <tr>
                                    <?php
                                    $thang = $dataDoanhThu['month'];
                                    $nam = $dataDoanhThu['year'];
                                    ?>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $thang . '/' . $nam; ?></td>
                                    <td><?php echo $dataDoanhThu['total_orders']; ?> </td>
                                    <td><?php echo number_format($dataDoanhThu['total_revenue']); ?> VNĐ</td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "Không tìm thấy dữ liệu!";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableBody = document.getElementById("product_table_body");
        const sortButtons = document.querySelectorAll(".sort-button");

        sortButtons.forEach(button => {
            button.addEventListener("click", function() {
                const column = button.dataset.column;
                const order = button.dataset.order === "asc" ? "ASC" : "DESC";

                // Reload the page with the new sorting parameters
                window.location.href = `?column=${column}&order=${order}`;
            });
        });
    });
</script>