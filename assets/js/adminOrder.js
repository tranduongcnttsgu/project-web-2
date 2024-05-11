function html([first, ...strings], ...values) {
    return values
        .reduce((acc, cur) => acc.concat(cur, strings.shift()), [first])
        .filter((x) => (x && x !== true) || x === 0)
        .join('');
}
const name_permission = 'quản lý đơn hàng';
let permission = {};

const customer_name = document.getElementById('customer_name');
const customer_phone = document.getElementById('customer_phone');
const customer_email = document.getElementById('customer_email');
const customer_address = document.getElementById('customer_address');
const order_date = document.getElementById('order_date');
const order_quantity = document.getElementById('order_quantity');
const order_total_price = document.getElementById('order_total_price');
const order_status_payment = document.getElementById('order_status_payment');
const table_order_detail = document.getElementById('table-order-detail');
const status_order = document.getElementById('status-order');
const button_update = document.getElementById('button-order-update');
const button_delete = document.getElementById('button-order-delete');
const checkPermissions = async () => {
    const req = await fetch('http://localhost/admin/check-permission');
    const res = await req.json();
    if (!res.success) {
        return (window.location.href = 'http://localhost/undefind-href');
    }
    permission =
        res.data.find((role) => {
            return role.permission.service === name_permission;
        })?.service ?? false;

    if (!permission) {
        return (window.location.href = 'http://localhost/undefind-href');
    }
    if (permission.action_update === 0) {
        button_update.classList.add('button-none');
    }
    if (permission.action_delete === 0) {
        button_delete.classList.add('button-none');
    }
    status_order.addEventListener('change', (e) => {
        if (e.target.value === 'đơn hàng bị hủy') {
            if (
                permission.action_update !== 0 &&
                permission.action_delete === 0
            ) {
                button_update.classList.add('button-none');
            }
        } else {
            button_update.classList.remove('button-none');
        }
    });
    console.log(permission);
};
checkPermissions();
const main = document.getElementById('main-manager-order-detail');
if (main) {
    button_delete.addEventListener('click', () => {
        dispatch('admin/order/popup/delete-order', 1);
    });

    button_update.addEventListener('click', () => {
        const status = status_order.value;
        const payload = new URLSearchParams();
        const orderId = JSON.parse(localStorage.getItem('orderId'));
        payload.set('status', status);
        payload.set('orderId', orderId);
        fetch('http://localhost/admin/order/update/status-order', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    window.location.reload();
                } else {
                    MessageBox('cập nhật không thành công', 'thông báo');
                }
            });
    });
    const getInfoOrder = () => {
        const orderId = JSON.parse(localStorage.getItem('orderId'));
        const payload = new URLSearchParams();
        payload.set('orderId', orderId);
        fetch('http://localhost/admin/getOrderCustomer', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
                const customer = data.data.customer;
                customer_name.innerHTML = customer.name;
                customer_address.innerHTML = customer.address;
                customer_email.innerHTML = customer.email;
                customer_phone.innerHTML = customer.phone;
                const order = data.data.order;
                if (+order.status_payment === 1) {
                    document
                        .getElementById('delete-order-sl')
                        .classList.add('hidden');
                }
                order_date.innerHTML = order.order_date;
                order_quantity.innerHTML = order.totail_product;
                order_status_payment.innerHTML = order.message_status_payment;
                order_total_price.innerHTML = (
                    order.totail_price * 1000
                ).toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND',
                });
                const orderDetail = data.data.orderDetail;

                if (order.message_status === 'đã giao hàng') {
                    button_delete.classList.add('button-none');
                    button_update.classList.add('button-none');
                    status_order.classList.add('pointer-none');
                }
                if (order.message_status === 'đơn hàng bị hủy') {
                    button_delete.classList.add('button-none');
                    button_update.classList.add('button-none');
                    status_order.classList.add('pointer-none');
                }
                for (let i, j = 0; (i = status_order.options[j]); j++) {
                    if (i.value === order.message_status) {
                        status_order.selectedIndex = j;

                        break;
                    }
                }
                const formatPrice = (price) => {
                    return (price * 1000).toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND',
                    });
                };
                const valueTable = html`
                    ${orderDetail.map((product, index) => {
                        return `
                 <tr>
                        <td>${++index}</td>
                        <td class="pcs">
                            <img src="http://localhost/assets/Db_img/${
                                product.product_image
                            }" alt="" width="50px" height="50px" style="object-fit: cover;">
                        </td>
                        <td class="cur">${product.product_name}</td>
                        <td class="per">${formatPrice(product.price)}</td>
                        <td class="per">${product.quantity}</td>
                        <td class="per">${formatPrice(
                            product.totail_price
                        )}</td>

                    </tr>
                `;
                    })}
                `;
                table_order_detail.innerHTML = valueTable;
            });
    };
    getInfoOrder();
}
