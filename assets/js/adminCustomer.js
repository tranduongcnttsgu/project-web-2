function html([first, ...strings], ...values) {
    return values
        .reduce((acc, cur) => acc.concat(cur, strings.shift()), [first])
        .filter((x) => (x && x !== true) || x === 0)
        .join('');
}
const name_permission = 'quản lý sản phẩm';
let permission = {};

const checkPermissions = async () => {
    const buttonUpdate = document.getElementById('button-customer-update');

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
        buttonUpdate.classList.add('button-none');
    }

    console.log(permission);
};
checkPermissions();
const getInforUser = () => {
    const UserId = JSON.parse(localStorage.getItem('manager-user-show-userId'));
    const payload = new URLSearchParams();
    const name = document.getElementById('customer_name');
    const phone = document.getElementById('customer_phone');
    const email = document.getElementById('customer_email');
    const address = document.getElementById('customer_address');
    const total_order = document.getElementById('order_quantity');
    const total_product = document.getElementById('order_product');
    const total_price = document.getElementById('order_total_price');
    const status = document.getElementById('status');
    const table = document.getElementById('table-order-detail');
    const selectStatus = document.getElementById('status-customer');
    payload.set('userId', UserId);
    fetch('http://localhost/admin/managerCustomer/getInfoCustomer', {
        method: 'post',
        body: payload,
    })
        .then((res) => res.json())
        .then((data) => {
            const formatPrice = (price) => {
                return (price * 1000).toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND',
                });
            };
            console.log(data);
            if (data.success) {
                const user = data.data.user;
                const infoOrder = data.data.infoOrder;
                const infoProduct = data.data.listPoduct;
                name.innerHTML = user.name;
                phone.innerHTML = user.phone;
                email.innerHTML = user.email;
                address.innerHTML = user.address;
                total_order.innerHTML = infoOrder.total_order;
                total_price.innerHTML = formatPrice(+infoOrder.total_price);
                total_product.innerHTML = infoOrder.total_product;
                selectStatus.value = user.status;
                if (+user.status === 1) {
                    status.innerHTML =
                        "  <span class='tick-green'></span> Đang hoạt động";
                } else {
                    status.innerHTML =
                        "  <span class='tick-red'></span>Tài khoản đã khóa";
                }
                const valueTable = html`
                    ${infoProduct.map((product, index) => {
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
                table.innerHTML = valueTable;
            }
        });
};
getInforUser();
const selectStatus = document.getElementById('status-customer');
const buttonUpdate = document.getElementById('button-customer-update');
buttonUpdate.addEventListener('click', () => {
    const status = selectStatus.value;
    const UserId = JSON.parse(localStorage.getItem('manager-user-show-userId'));
    const payload = new URLSearchParams();
    payload.set('userId', UserId);
    payload.set('status', status);
    fetch('http://localhost/admin/managerCustomer/UpdateStatus', {
        method: 'post',
        body: payload,
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                MessageBox('Cập nhật thành công', 'thông báo');
                setTimeout(() => window.location.reload(), 3000);
            } else {
                MessageBox('Cập nhật không thành công', 'thông báo');
            }
        });
});
