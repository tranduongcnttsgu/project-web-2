// ====================product  detail page ======================
const buttonBuyNow = document.getElementById('button-product-detail-buy-now');
if (buttonBuyNow) {
    console.log(buttonBuyNow);
    buttonBuyNow.addEventListener('click', () => {
        const productId = JSON.parse(localStorage.getItem('showProductId'));
        dispatch('user/productDetal/buy', productId);
    });
}

// ========================cart page ==========================
const showInforTransport = document.getElementById('transport-info');
if (showInforTransport) {
    const getInfoUser = () => {
        fetch('http://localhost/account/user-info-login')
            .then((res) => res.json())
            .then((data) => {
                user = data.data.data;
                const html = `
                <div class="transport-infor" >
                          Tên: ${user.name}
                        </div>
                        <div class="transport-phone-number">SDT: ${user.phone}</div>
                    <div class="transport-address">
                     Địa chỉ: ${user.address}
                    </div>
                 `;
                showInforTransport.innerHTML = html;
            });
    };
    getInfoUser();
}
//=====================  user page ==============================

const handleAddProductOrder = (ele, productId) => {
    if (ele.checked === true) {
        dispatch('user/cartProduct/addoneOrder', productId);
    } else if (ele.checked === false) {
        dispatch('user/cartProduct/deleteoneOrder', productId);
    }
};
const handleAddManyProduct = (ele) => {
    if (ele.checked === true) {
        dispatch('user/cartProduct/addManyorder');
    } else if (ele.checked === false) {
        dispatch('user/cartProduct/deleteManyOrder');
    }
};
const button_delete_order = document.querySelectorAll(
    '#button-delete-order-user'
);
if (button_delete_order.length !== 0) {
    button_delete_order.forEach((ele) => {
        ele.addEventListener('click', (e) => {
            const orderId = e.target.getAttribute('data-order');
            localStorage.setItem('user_OrderId', JSON.stringify(orderId));
            dispatch('user/order/popup/delete-order', 1);
        });
    });
}
const button_payment_order = document.querySelectorAll(
    '#button-payment-order-user'
);
if (button_payment_order.length !== 0) {
    button_payment_order.forEach((ele) => {
        ele.addEventListener('click', (e) => {
            const orderId = e.target.getAttribute('data-order');
            const status = 'đã thanh toán';
            const payload = new URLSearchParams();

            payload.set('status', status);
            payload.set('orderId', orderId);
            fetch('http://localhost/user/order/update/status-order/payment', {
                method: 'post',
                body: payload,
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        MessageBox('Cập nhật không thành công', 'thông báo');
                    }
                });
        });
    });
}
const formInfo = document.getElementById('form-info');
if (formInfo) {
    let user = {};
    const getInfoUser = () => {
        fetch('http://localhost/account/user-info-login')
            .then((res) => res.json())
            .then((data) => {
                user = data.data.data;
                const listInput = document.querySelectorAll(
                    ' .form-group input '
                );
                const inputs = [...listInput];

                console.log(inputs);
                inputs.map((input) => {
                    if (input.id === 'fullName') {
                        input.value = user.name;
                    } else if (input.id === 'phone') {
                        input.value = user.phone;
                    } else if (input.id === 'emailInfo') {
                        input.value = user.email;
                    } else if (input.id === 'nickname') {
                        input.value = user.nickname;
                    } else if (input.id === 'address') {
                        input.value = user.address;
                    }
                });
            });
    };
    getInfoUser();

    Validator({
        form: '#form-info',
        formGroupSelector: '.form-group',
        errorSelector: '.error-message',
        rules: [
            Validator.isEmail('#emailInfo'),

            Validator.isRequired(
                '#fullName',
                'Vui lòng nhập tên đầy đủ của bạn'
            ),
            Validator.minLength('#fullName', 2),
            Validator.isRequired('#address', 'Vui lòng nhập tài khoản của bạn'),
            Validator.minLength('#address', 12),
            Validator.isRequired('#emailInfo', 'Vui lòng nhập email của bạn'),
            Validator.isEmail('#emailInfo'),
            Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
            Validator.isNumber('#phone'),
            Validator.minLength('#phone', 10),
        ],
        onSubmit: function (data) {
            const payload = new URLSearchParams(new FormData(formInfo));
            console.log(data);
            fetch('http://localhost/user/update-info', {
                method: 'post',
                body: payload,
            })
                .then((res) => res.json())
                .then((data) => window.location.reload());
        },
    });
}
