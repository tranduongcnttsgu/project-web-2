<section id="sidebar">
    <span class="brand">bookStore</span>
    <ul class="side-menu">
        <!-- <li><span class="active"><i class='bx bxs-dashboard icon'></i>Thống kê</span></li>
        <li class="divider" data-text="Quản lý">Quản lý</li>
        <li>
            <span><i class='bx bxs-inbox icon'></i> quản lý <i class='bx bx-chevron-right icon-right'></i></span>
            <ul class="side-dropdown">
                <li><span>sản phẩm</span></li>
                <li><span>đơn hàng</span></li>
                <li><span></span></li>

            </ul>
        </li> -->
        <!-- <li><span><i class='bx bxs-chart icon'></i> template</span></li>
        <li><span><i class='bx bxs-widget icon'></i> template</span></li> -->
        <?php

        use controllers\client;

        $client = new client();
        $getNav  = $client->adminLayout();
        if (sizeof($getNav) === 0) {
            $getNav[0]["role"]["service"] = 'none';
        } else {
            // $value =>>{
            //     role: {
            //     permission_id: "20240426084510A0PtAjlwxL",
            //     service: "quản lý đơn hàng",
            //     user_permission_id: "20240426084418eAfooyOdVm"
            //     },
            //     permission: {
            //     service_id: "2",
            //     permission_id: "20240426084510A0PtAjlwxL",
            //     view: "1",
            //     action_delete: "1",
            //     action_update: "1",
            //     action_create: "0"
            //     }
            //     },

            foreach ($getNav as $key => $value) {
                if (strcmp($value["role"]["service"], "thống kê") == 0) {

        ?>
                    <a href="http://localhost/admin/manager/statics">
                        <li site="static"><span class=""><i class='bx bxs-dashboard icon'></i>Thống kê</span></li>
                    </a>

                <?php

                }
                if (strcmp($value["role"]["service"], "quản lý đơn hàng") === 0) {
                ?>
                    <a href="http://localhost/admin/manager/orders">
                        <li site="managerOrder"><span><i class='bx bxs-chart icon'></i>quản lý đơn hàng</span></li>
                    </a>



                <?php
                }
                if (strcmp($value["role"]["service"], "quản lý sản phẩm") === 0) {

                ?>
                    <a href="http://localhost/admin/manager/products">
                        <li site="managerOrder"><span><i class='bx bxs-chart icon'></i>quản sản phẩm</span></li>
                    </a>

                <?php

                }
                if (strcmp($value["role"]["service"], "quản lý khách hàng") === 0) {
                ?>
                    <a href="http://localhost/admin/manager/customer">
                        <li site="managerOrder"><span><i class='bx bxs-chart icon'></i>quản lý khách hàng</span></li>
                    </a>

                <?php
                }
                if (strcmp($value["role"]["service"], "phần Quyền") == 0) {

                ?>

                    <a href="http://localhost/admin/decentralize">
                        <li class=""><span><i class='bx bx-table icon '></i>phần quyền</span></li>
                    </a>
                    <!-- <li>
                            <span><i class='bx bxs-notepad icon'></i>Tài khoản <i class='bx bx-chevron-right icon-right'></i></span>
                            <ul class="side-dropdown">
                                <li><span>khách hàng</span></li>
                                <li><span>nhân viên</span></li>
            
                            </ul>
                        </li> -->


        <?php
                }
            }
        }

        ?>
    </ul>

</section>