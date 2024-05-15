<main class="main-order-wrapper" id="main-manager-order-detail">
    <div class="container-top">
        <div class="order-infor-wrapper">
            <div class="order-content-letf">
                <div class="fui-table-ui-basic-linh table-wrap">
                    <h3 class="order-title">thông tin khách hàng</h3>
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
                                <td class="cur">email:</td>
                                <td class="per" id="customer_email">root</td>
                            </tr>
                            <tr>
                                <td class="cur">địa chỉ:</td>
                                <td class="per" id="customer_address">root</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="order-content-right">
                <div class="fui-table-ui-basic-linh table-wrap">
                    <h3 class="order-title"></h3>
                    <table>

                        <tbody>
                            <tr>
                                <td class="cur">số đơn hàm đã mua</td>
                                <td class="per" id="order_quantity">số đơn hàng đã mua</td>
                            </tr>
                            <tr>
                                <td class="cur">tổng sản phẩm:</td>
                                <td class="per" id="order_product">root</td>
                            </tr>
                            <tr>
                                <td class="cur">tổng tiền đã chi:</td>
                                <td class="per" id="order_total_price">root</td>
                            </tr>
                            <tr>
                                <td class="cur">trạng thái:</td>
                                <td class="per" id="status">root</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="order-action-wrapper">
            <h3 class="container-order-title">thao tác</h3>
            <div class="action-wrapper">
                <div class="status-order-wrapper">
                    <label for="status-customer">trạng thái tài khoản:</label>
                    <select name="status-customer" id="status-customer">
                        <option value="1">hoạt động</option>
                        <option value="0">chặn tài khoản</option>


                    </select>
                </div>
                <div class="button-wrapper">
                    <button class="order-button-action order-button-acept" id="button-customer-update">cập nhật</button>

                </div>
            </div>
        </div>
    </div>
    <div class="container-bottom">
        <h3 class="container-order-title">danh sách sản phẩm đã mua</h3>
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>std</th>
                        <th>ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>giá</th>
                        <th>số lượng</th>
                        <th>tổng giá</th>
                    </tr>
                </thead>
                <tbody id="table-order-detail">

                    <tr>
                        <td>2</td>
                        <td class="pcs">
                            <img src="" alt="" width="50px" height="50px" style="object-fit: cover;">
                        </td>
                        <td class="cur">product</td>
                        <td class="per">50,71</td>
                        <td class="per">12</td>
                        <td class="per">12344</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>