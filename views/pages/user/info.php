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
                <li titles="shop" class="active" key="0">
                    <span><i class="bx bx-store-alt"></i>Thông tin người dùng</span>
                </li>
                <li titles="static" key="1">
                    <span><i class="bx bx-analyse"></i>Đơn hàng</span>
                </li>
                <li titles="mes" key="2">
                    <span><i class="bx bx-group"></i>Sản phẩm đã mua</span>
                </li>


            </ul>
            <ul class="side-menu">
                <li onclick="dispatch('user/logout',1)" class="logout-btn">
                    <span class="logout">
                        <i class="bx bx-log-out-circle"></i>
                        Đăng xuất
                    </span>
                </li>
            </ul>
        </div>
        <?php
        require_once __DIR__ . "/nav.php";
        ?>
    </div>
    <div class="container-right">
        <main class="user-info-main" id="user-info-main">
            <div class="infor-update-wrapper">

                <div class="bt-form-contact-simple">
                    <div class="contact-item">
                        <h2 class="contact-title">Thông tin khách hàng</h2>
                        <form class="form" action="" autocomplete="off" id="form-info" method="post">
                            <div class="form-group-wrap">
                                <div class="form-group">
                                    <label for="fullName">Họ và tên</label>
                                    <input type="text" name="fullName" id="fullName" placeholder="Họ và tên" class="form-input" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Điện thoại</label>
                                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại" class="form-input" />
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="form-group-wrap">
                                <div class="form-group">
                                    <label for="nickname">Tên khác</label>
                                    <input type="text" name="nickname" id="nickname" placeholder="Tên khác" class="form-input" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="form-group">
                                    <label for="emailInfo">Email</label>
                                    <input type="text" name="emailInfo" id="emailInfo" placeholder="Email" class="form-input" />
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" placeholder="Địa chỉ" class="form-input" />
                                <span class="error-message"></span>
                            </div>

                            <div class="form-btn-wrap">

                                <button type="submit" id="btnSubmit" class="form-btn form-btn--submit">
                                    Cập nhật
                                </button>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
            <div class="user-info-right" id="rootInforContentLeft">

            </div>
        </main>






    </div>
</section>


<script type="module" src="http://localhost/assets/js/userSlice/index.js"></script>