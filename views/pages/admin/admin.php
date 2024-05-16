<?php

use controllers\client;

$client = new client();
$getcontent  = $client->adminLayout();
if (sizeof($getcontent) === 0) {
?>
    <main>
        <div class="error-authenlication-wrapper" style="width:100%;
                    display:flex;
                    flex-direction: column;
                    align-items:center;
                  ">
            <h3 class="authenlication-title">
                <span style="color: red;">Lỗi!</span>
                Tài khoản chưa được cấp quyền truy cập
            </h3>
            <img src="http://localhost/assets/Db_img/error-authenlication.webp" alt="">
        </div>
    </main>
<?php

} else if ($getcontent[0]["role"]["service"] === 'phần Quyền') {
    echo $client->getContentLayout('admin/decentralize', "show");
} else if ($getcontent[0]["role"]["service"] === 'quản lý đơn hàng') {
    echo $client->getContentLayout('admin/managerOrder', "show");
} else if ($getcontent[0]["role"]["service"] === 'quản lý sản phẩm') {
    echo $client->getContentLayout('admin/managerProduct', "show");
} else if ($getcontent[0]["role"]["service"] === 'quản lý khách hàng') {
    echo $client->getContentLayout('admin/managerCustomer', "show");
} else if ($getcontent[0]["role"]["service"] === 'thống kê') {
    echo $client->getContentLayout('admin/statics', "show");
}

?>