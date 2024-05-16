<main>
    <h3>Danh sách người dùng</h3>
    <div class="fui-table-ui-basic-linh table-wrap">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số đơn hàng đã mua</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use controllers\UserController;

                $uc = new UserController();
                $listUser = $uc->adminGetListCustomer();

                $index = 0;
                foreach ($listUser as $key => $value) :
                ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td class="pcs"><?php echo $value["user"]["name"]; ?></td>
                        <td class="cur"><?php echo $value["user"]["email"]; ?></td>
                        <td class="per"><?php echo $value["InfoOrder"]; ?></td>
                        <td class="per"><?php
                                        if (strcmp($value["user"]["status"], "1") === 0) {
                                            echo "
                                            <span class='tick-green'></span>
                                            Đang hoạt động";
                                        } else {
                                            echo "
                                            
                                            <span class='tick-red'></span>
                                            Đã bị khóa";
                                        }
                                        ?></td>
                        <td class="per">
                            <button class="button-action-order" id="button-action-show-user" data-user="<?php echo $value["user"]["user_id"]; ?>">Chi tiết<i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</main>