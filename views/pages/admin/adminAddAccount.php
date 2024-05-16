<main>
    <div class="title">Thêm tài khoản nhân viên mới</div>
    <div class="container-top">
        <div class="bt-form-contact-simple">
            <div class="contact-item">
                <h2 class="contact-title">Thông tin tài khoản</h2>
                <form class="form" autocomplete="off" id="form-add-account">
                    <div class="form-group-wrap">
                        <div class="form-group">
                            <input type="text" name="fullName" id="fullName" placeholder="Họ và tên" class="form-input" />
                            <span class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" class="form-input" />
                            <span class="error-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="emailInfo" id="emailInfo" placeholder="Email" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group-wrap">
                        <div class="form-group">
                            <input type="text" name="password" id="password" placeholder="Mật khẩu" class="form-input" />
                            <span class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="confirmPassword" id="password_confirmation" placeholder="Nhập lại mật khẩu" class="form-input" />
                            <span class="error-message"></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" placeholder="địa chỉ" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <h2 class="contact-title">Cấp quyền</h2>
                    <div class="">
                        <div class="fui-table-ui-basic-linh table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tên nhóm quyền</th>
                                        <th>Xem</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                        <th>Thêm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="addRole">
                                        <td class="nameRole" data-name="phần Quyền">Phân quyền</td>
                                        <td class="view">
                                            <input type="checkbox" data-name="view">
                                        </td>
                                        <td class="ac-update">
                                            <input type="checkbox" data-name="action_update">
                                        </td>
                                        <td class="ac-delete">
                                            <input type="checkbox" data-name="action_delete">
                                        </td>
                                        <td class="ac-add">
                                            <input type="checkbox" data-name="action_add">
                                        </td>
                                    </tr>
                                    <tr class="addRole">
                                        <td class="nameRole" data-name="thống kê">Thống kê</td>
                                        <td class="view">
                                            <input type="checkbox" data-name="view">
                                        </td>
                                        <td class="ac-update">
                                            <input type="checkbox" data-name="action_update">
                                        </td>
                                        <td class="ac-delete">
                                            <input type="checkbox" data-name="action_delete">
                                        </td>
                                        <td class="ac-add">
                                            <input type="checkbox" data-name="action_add">
                                        </td>
                                    </tr>
                                    <tr class="addRole">
                                        <td class="nameRole" data-name="quản lý đơn hàng">Quản lý đơn hàng</td>
                                        <td class="view">
                                            <input type="checkbox" data-name="view">
                                        </td>
                                        <td class="ac-update">
                                            <input type="checkbox" data-name="action_update">
                                        </td>
                                        <td class="ac-delete">
                                            <input type="checkbox" data-name="action_delete">
                                        </td>
                                        <td class="ac-add">
                                            <input type="checkbox" data-name="action_add">
                                        </td>
                                    </tr>
                                    <tr class="addRole">
                                        <td class="nameRole" data-name="quản lý sản phẩm">Quản lý sản phẩm</td>
                                        <td class="view">
                                            <input type="checkbox" data-name="view">
                                        </td>
                                        <td class="ac-update">
                                            <input type="checkbox" data-name="action_update">
                                        </td>
                                        <td class="ac-delete">
                                            <input type="checkbox" data-name="action_delete">
                                        </td>
                                        <td class="ac-add">
                                            <input type="checkbox" data-name="action_add">
                                        </td>
                                    </tr>
                                    <tr class="addRole">
                                        <td class="nameRole" data-name="quản lý khách hàng">Quản lý khách hàng</td>
                                        <td class="view">
                                            <input type="checkbox" data-name="view">
                                        </td>
                                        <td class="ac-update">
                                            <input type="checkbox" data-name="action_update">
                                        </td>
                                        <td class="ac-delete">
                                            <input type="checkbox" data-name="action_delete">
                                        </td>
                                        <td class="ac-add">
                                            <input type="checkbox" data-name="action_add">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-btn-wrap">
                        <button type="submit" id="btnSubmit" class="form-btn form-btn--submit">
                            Thêm tài khoản
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="container-bottom">
    </div>
</main>