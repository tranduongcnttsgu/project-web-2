<main class="main-order-wrapper" id="main-manager-order-detail">
    <div class="container-top">
        <div class="order-infor-wrapper">
            <div class="order-content-letf">
                <div class="fui-table-ui-basic-linh table-wrap">
                    <h3 class="order-title">Thông tin khách hàng</h3>
                    <table>

                        <tbody>

                            <tr>
                                <td class="cur">Tên khách hàng:</td>
                                <td class="per" id="customer_name">root</td>
                            </tr>
                            <tr>
                                <td class="cur">Số điện thoại:</td>
                                <td class="per" id="customer_phone">123123</td>
                            </tr>
                            <tr>
                                <td class="cur">Email:</td>
                                <td class="per" id="customer_email">root</td>
                            </tr>
                            <tr>
                                <td class="cur">Địa chỉ:</td>
                                <td class="per" id="customer_address">root</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="order-content-right">
                <div class="fui-table-ui-basic-linh table-wrap">
                    <h3 class="order-title">Thông tin đơn hàng</h3>
                    <table>

                        <tbody>
                            <tr>
                                <td class="cur">Ngày đặt hàng:</td>
                                <td class="per" id="order_date">root</td>
                            </tr>
                            <tr>
                                <td class="cur">Tổng sản phẩm:</td>
                                <td class="per" id="order_quantity">root</td>
                            </tr>
                            <tr>
                                <td class="cur">Tổng tiền:</td>
                                <td class="per" id="order_total_price">root</td>
                            </tr>
                            <tr>
                                <td class="cur">Trạng thái thanh toán:</td>
                                <td class="per" id="order_status_payment">root</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="order-action-wrapper">
            <h3 class="container-order-title">Thao tác</h3>
            <div class="action-wrapper">
                <div class="status-order-wrapper">
                    <label for="status-order">Trạng thái đơn hàng:</label>
                    <select name="status-order" id="status-order">
                        <option value="đang chờ sử lý">Đang chờ xử lý</option>
                        <option value="đơn hàng bị hủy" id="delete-order-sl">Đơn hàng bị hủy</option>
                        <option value="đang giao hàng">Đang giao hàng</option>
                        <option value="đã giao hàng">Đã giao hàng</option>

                    </select>
                </div>
                <div class="button-wrapper">
                    <button class="order-button-action order-button-acept" id="button-order-update">Cập nhật</button>
                    <button class="order-button-action order-button-delete" id="button-order-delete">Hủy đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-bottom">
        <h3 class="container-order-title">Danh sách sản phẩm</h3>
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                    </tr>
                </thead>
                <tbody id="table-order-detail">

                    <tr>
                        <td>2</td>
                        <td class="pcs">
                            <img src="" alt="" width="50px" height="50px" style="object-fit: cover;">
                        </td>
                        <td class="cur">product</td>
                        <td class="per">0</td>
                        <td class="per">0</td>
                        <td class="per">0</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>