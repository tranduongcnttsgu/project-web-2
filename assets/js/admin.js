function elementHTML([first, ...strings], ...values) {
    return values
        .reduce((acc, cur) => acc.concat(cur, strings.shift()), [first])
        .filter((x) => (x && x !== true) || x === 0)
        .join('');
}
// script nav
// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach((item) => {
    const a = item.parentElement.querySelector('span:first-child');
    a.addEventListener('click', function (e) {
        e.preventDefault();

        if (!this.classList.contains('active')) {
            allDropdown.forEach((i) => {
                const aLink = i.parentElement.querySelector('span:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            });
        }

        this.classList.toggle('active');
        item.classList.toggle('show');
    });
});

// SIDEBAR COLLAPSE
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const allSideDivider = document.querySelectorAll('#sidebar .divider');

if (sidebar.classList.contains('hide')) {
    allSideDivider.forEach((item) => {
        item.textContent = '-';
    });
    allDropdown.forEach((item) => {
        const a = item.parentElement.querySelector('span:first-child');
        a.classList.remove('active');
        item.classList.remove('show');
    });
} else {
    allSideDivider.forEach((item) => {
        item.textContent = item.dataset.text;
    });
}

toggleSidebar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');

    if (sidebar.classList.contains('hide')) {
        allSideDivider.forEach((item) => {
            item.textContent = '-';
        });

        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector('span:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        });
    } else {
        allSideDivider.forEach((item) => {
            item.textContent = item.dataset.text;
        });
    }
});

sidebar.addEventListener('mouseleave', function () {
    if (this.classList.contains('hide')) {
        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector('span:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        });
        allSideDivider.forEach((item) => {
            item.textContent = '-';
        });
    }
});

sidebar.addEventListener('mouseenter', function () {
    if (this.classList.contains('hide')) {
        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector('span:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        });
        allSideDivider.forEach((item) => {
            item.textContent = item.dataset.text;
        });
    }
});

// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
    dropdownProfile.classList.toggle('show');
});

// MENU
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach((item) => {
    const icon = item.querySelector('.icon');
    const menuLink = item.querySelector('.menu-link');

    icon.addEventListener('click', function () {
        menuLink.classList.toggle('show');
    });
});

window.addEventListener('click', function (e) {
    if (e.target !== imgProfile) {
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains('show')) {
                dropdownProfile.classList.remove('show');
            }
        }
    }

    allMenu.forEach((item) => {
        const icon = item.querySelector('.icon');
        const menuLink = item.querySelector('.menu-link');

        if (e.target !== icon) {
            if (e.target !== menuLink) {
                if (menuLink.classList.contains('show')) {
                    menuLink.classList.remove('show');
                }
            }
        }
    });
});
// action table decentralize ==============================================
function getParent(el, parentSelector) {
    let element = el;

    if (!element) {
        return element;
    }

    while (element.parentElement) {
        if (element.parentElement.matches(parentSelector)) {
            return element.parentElement;
        }
        element = element.parentElement;
    }
    return element;
}
const handleClick = (ev) => {
    const el = ev.currentTarget;
    const trView = getParent(el, 'tr.view');
    const trFold = trView?.nextElementSibling;
    const foldContent = trFold?.querySelector('.fold-content-wrap');

    trView?.classList.toggle('open');
    trFold?.classList.toggle('open');

    if (trFold?.classList.contains('open')) {
        foldContent?.setAttribute(
            'style',
            `height: ${foldContent.scrollHeight}px`
        );
        return true;
    }
    foldContent?.setAttribute('style', `height: 0px`);

    return true;
};

const btnAccordionTableList = document.querySelectorAll(
    'button.td-btn-accordion'
);

Array.from(btnAccordionTableList).forEach((btn) => {
    btn?.addEventListener('click', handleClick);
});
const ListRoles = document.querySelectorAll('.addRole') ?? false;
if (ListRoles.length !== 0) {
    const listRoles = [...ListRoles];
    let roles = [];
    listRoles.forEach((ele) => {
        const name = ele.firstElementChild.getAttribute('data-name');
        const input = ele.querySelectorAll('input');

        [...input].forEach((ip) => {
            ip.addEventListener('change', (e) => {
                const nameRole =
                    ip.parentElement.parentElement.firstElementChild.getAttribute(
                        'data-name'
                    );
                let role = {};
                if (roles.some((rol) => rol.name === nameRole)) {
                    role = roles.find((rol) => {
                        if (rol.name === nameRole) {
                            return rol;
                        }
                    });
                } else {
                    role = {
                        name: nameRole,
                        view: 0,
                        action_add: 0,
                        action_delete: 0,
                        action_update: 0,
                    };
                }
                if (e.target.checked === true) {
                    const action = e.target.getAttribute('data-name');
                    role[`${action}`] = 1;
                } else {
                    const action = e.target.getAttribute('data-name');
                    role[`${action}`] = 0;
                }
                if (roles.some((rol) => rol.name === role.name)) {
                    roles = roles.map((rol) => {
                        if (rol.name === role.name) {
                            return role;
                        }
                        return rol;
                    });
                } else {
                    roles.push(role);
                }
            });
        });
    });

    Validator({
        form: '#form-add-account',
        formGroupSelector: '.form-group',
        errorSelector: '.error-message',
        rules: [
            Validator.isEmail('#emailInfo'),

            Validator.isRequired(
                '#fullName',
                'Vui lòng nhập tên đầy đủ của bạn'
            ),
            Validator.minLength('#fullName', 2),
            Validator.isRequired('#address', 'Vùi lòng nhập đại chỉ của bạn'),
            Validator.minLength('#address', 12),
            Validator.isRequired('#emailInfo', 'Vui lòng nhập email của bạn'),
            Validator.isEmail('#emailInfo'),
            Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
            Validator.isNumber('#phone'),
            Validator.minLength('#phone', 10),
            Validator.isRequired('#password', 'Vui lòng nhập mật khẩu của bạn'),
            Validator.minLength('#password', 6),
            Validator.isRequired(
                '#password_confirmation',
                'Vui lòng nhập mật khẩu của bạn'
            ),
            Validator.isConfirmed(
                '#password_confirmation',
                function () {
                    return document.querySelector('#form-add-account #password')
                        .value;
                },
                'Mật khẩu nhập lại không chính xác'
            ),
        ],
        onSubmit: function (data) {
            const payload = JSON.stringify({ account: data, roles });

            fetch('http://localhost/admin/addAccount', {
                method: 'post',
                body: payload,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        MessageBox('thêm tài khoản thành công', 'thông báo');
                    }
                });
        },
    });
}
const adminEditAccount = document.getElementById('adminEditAccount');
if (adminEditAccount) {
    const name = document.getElementById('fullName');
    const phone = document.getElementById('phone');
    const email = document.getElementById('emailInfo');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const address = document.getElementById('address');
    let roles = [];
    let user;
    const editAccount = () => {
        const id = JSON.parse(localStorage.getItem('userId'));
        const payload = new URLSearchParams();
        payload.set('userId', id.trim());
        fetch('http://localhost/admin/edit/getAccount', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
                user = data.data.user;
                name.value = user.name;
                phone.value = user.phone;
                email.value = user.email;
                password.value = user.password;
                confirmPassword.value = user.password;
                address.value = user.address;
                const ListRoles = document.querySelectorAll('.addRole');

                data.data.roles.forEach((role) => {
                    if (role.service !== false) {
                        roles.push({
                            name: role.permission.service,
                            action_delete: role.service.action_delete,
                            action_update: role.service.action_update,
                            action_add: role.service.action_create,
                            view: role.service.view,
                        });
                    }
                    [...ListRoles].forEach((ele) => {
                        const name =
                            ele.firstElementChild.getAttribute('data-name');
                        const input = ele.querySelectorAll('input');
                        if (role.permission.service === name) {
                            input.forEach((i) => {
                                if (
                                    i.getAttribute('data-name') === 'action_add'
                                ) {
                                    if (role.service.action_create === 1) {
                                        i.checked = true;
                                    }
                                } else if (
                                    role.service[
                                        `${i.getAttribute('data-name')}`
                                    ] === 1
                                ) {
                                    i.checked = true;
                                }
                            });
                        }
                    });
                });
            });
    };
    editAccount();
    const listRoles = [...ListRoles];

    listRoles.forEach((ele) => {
        const name = ele.firstElementChild.getAttribute('data-name');
        const input = ele.querySelectorAll('input');

        [...input].forEach((ip) => {
            ip.addEventListener('change', (e) => {
                const nameRole =
                    ip.parentElement.parentElement.firstElementChild.getAttribute(
                        'data-name'
                    );
                let role = {};
                if (roles.some((rol) => rol.name === nameRole)) {
                    role = roles.find((rol) => {
                        if (rol.name === nameRole) {
                            return rol;
                        }
                    });
                } else {
                    role = {
                        name: nameRole,
                        view: 0,
                        action_add: 0,
                        action_delete: 0,
                        action_update: 0,
                    };
                }
                if (e.target.checked === true) {
                    const action = e.target.getAttribute('data-name');
                    role[`${action}`] = 1;
                } else {
                    const action = e.target.getAttribute('data-name');
                    role[`${action}`] = 0;
                }
                if (roles.some((rol) => rol.name === role.name)) {
                    roles = roles.map((rol) => {
                        if (rol.name === role.name) {
                            return role;
                        }
                        return rol;
                    });
                } else {
                    roles.push(role);
                }
            });
        });
    });

    Validator({
        form: '#form-edit-account',
        formGroupSelector: '.form-group',
        errorSelector: '.error-message',
        rules: [
            Validator.isEmail('#emailInfo'),

            Validator.isRequired(
                '#fullName',
                'Vui lòng nhập tên đầy đủ của bạn'
            ),
            Validator.minLength('#fullName', 2),
            Validator.isRequired('#address', 'Vùi lòng nhập đại chỉ của bạn'),
            Validator.minLength('#address', 12),
            Validator.isRequired('#emailInfo', 'Vui lòng nhập email của bạn'),
            Validator.isEmail('#emailInfo'),
            Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
            Validator.isNumber('#phone'),
            Validator.minLength('#phone', 10),
            Validator.isRequired('#password', 'Vui lòng nhập mật khẩu của bạn'),
            Validator.minLength('#password', 6),
            Validator.isRequired(
                '#password_confirmation',
                'Vui lòng nhập mật khẩu của bạn'
            ),
            Validator.isConfirmed(
                '#password_confirmation',
                function () {
                    return document.querySelector(
                        '#form-edit-account #password'
                    ).value;
                },
                'Mật khẩu nhập lại không chính xác'
            ),
        ],
        onSubmit: function (data) {
            roles = roles.filter((role) => {
                return !(role.view === 0);
            });

            const payload = JSON.stringify({
                account: data,
                roles,
                userId: user.user_id,
            });
            fetch('http://localhost/admin/editAccount', {
                method: 'post',
                body: payload,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        MessageBox('đã cập nhật tài khoản', 'thông báo');
                    } else {
                        MessageBox('cập nhật không thành công', 'thông báo');
                    }
                });
        },
    });
}
//  manager order action ================================================================
const listSortButton = document.querySelectorAll('.manager-order-button');

if (listSortButton.length !== 0) {
    listSortButton.forEach((ele) => {
        ele.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-sort');
            const payload = new URLSearchParams();
            if (+id === 0) {
                payload.set('all', 0);
            } else if (+id === 1) {
                payload.set('status_stransport', 0);
            } else if (+id === 2) {
                payload.set('status_stransport', 1);
            } else if (+id === 3) {
                payload.set('status_payment', 1);
            } else if (+id === 4) {
                payload.set('status_stransport', 2);
            } else if (+id === 5) {
                payload.set('status_stransport', -1);
            }
            fetch('http://localhost/admin/manager-order/sort-order', {
                method: 'post',
                body: payload,
            })
                .then((res) => res.json())
                .then((data) => {
                    const formatNumber = (n) => {
                        return (+n * 1000).toLocaleString() + ' đ';
                    };
                    const table = document.getElementById('table-show-order');
                    const infoOrder = data.data;
                    if (!data.success) {
                        table.innerHTML =
                            ' <h3 class="title-no-order-sort">không có đơn hàng nào</h3> ';
                        return;
                    }
                    const value = elementHTML`
                     ${infoOrder.map((info, index) => {
                         return `
                         <tr>
                            <td>${index}</td>
                            <td class="pcs">
                               ${info.order.create_at}
                            </td>
                            <td class="cur">
                                <div class=" info-customer-wrapper">
                                    <div class="info-name">
                                     ${info.user.name}
                                    </div>
                                    <div class="info-std">
                                     ${info.user.phone}
                                    </div>
                                    <div class="info-email">
                                    ${info.user.email}
                                    </div>
                                </div>
                            </td>
                            <td class="per">
                                <div class="info-order-wrapper">
                                    <div class="info-order-price">
                                        Tổng tiền đơn hàng:
                                       ${formatNumber(
                                           info.order.totail_price
                                       )}</div>
                                    <div class="info-quantity">số lượng sản phẩm:
                                       ${info.order.totail_product}
                                    </div>
                                </div>
                            </td>
                            </td>
                            <td class="per">
                             ${info.order.message_status}
                            </td>
                            <td class="per">${
                                info.order.message_status_payment
                            }</td>
                            <td class="per">
                                <button class="button-action-order" id="button-action-order" data-order="${
                                    info.order.order_id
                                }"
                                onclick ="handleButtonShowOrderDetail(this)"
                                >thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                        `;
                     })}
                    `;
                    table.innerHTML = value;
                });
        });
    });
}
const handleButtonShowOrderDetail = (ele) => {
    const orderId = ele.getAttribute('data-order');
    localStorage.setItem('orderId', JSON.stringify(orderId.trim()));
    window.location.href = 'http://localhost/admin/order/detail';
};

const buttonActionOrder = document.querySelectorAll('.button-action-order');
if (buttonActionOrder) {
    buttonActionOrder.forEach((button) => {
        button.addEventListener('click', (e) => {
            const orderId = e.target.getAttribute('data-order');
            localStorage.setItem('orderId', JSON.stringify(orderId));
            window.location.href = 'http://localhost/admin/order/detail';
        });
    });
}
//manager product action ========================================================
const buttonActionProduct = document.querySelectorAll(
    '#button-action-mnProduct'
);
buttonActionProduct.forEach((ele) => {
    ele.addEventListener('click', (e) => {
        const productid = e.target.getAttribute('data-product');
        localStorage.setItem(
            'ad-manager-productId',
            JSON.stringify(productid.trim())
        );
        window.location.href = 'http://localhost/admin/product/detail';
    });
});
const handleButtonActionShowProduct = (e) => {
    const productid = e.getAttribute('data-product');
    localStorage.setItem(
        'ad-manager-productId',
        JSON.stringify(productid.trim())
    );
    window.location.href = 'http://localhost/admin/product/detail';
};
const paginationPage = async () => {
    const payload = new URLSearchParams();

    const pagination = {
        itemPerPage: 5,
        currentPage: 1,
        start: 0,
        end: 5,
        totalProduct: 0,
        totalPage: 1,
    };
    const res = await fetch('http://localhost/total-product', {
        method: 'get',
    });
    const data = await res.json();
    pagination.totalProduct = data.data;
    pagination.totalPage = Math.ceil(
        pagination.totalProduct / pagination.itemPerPage
    );
    document.getElementById(
        'total-product'
    ).innerHTML = `${data.data} sản phẩm`;

    buttonPagiantionMnpPrev = document.getElementById(
        'btn-pagination-mnp-prev'
    );
    // button prev pagination
    buttonPagiantionMnpPrev.addEventListener('click', () => {
        if (pagination.start === 0) {
            return;
        }
        pagination.currentPage = pagination.currentPage - 1;
        pagination.start =
            (pagination.currentPage - 1) * pagination.itemPerPage;
        pagination.end = pagination.currentPage * pagination.itemPerPage;
        if (pagination.start === 0) {
            buttonPagiantionMnpPrev.classList.add('pointer-none');
        }
        if (
            pagination.end < pagination.totalProduct &&
            buttonPaginationMnpNext.classList.contains('pointer-none')
        ) {
            buttonPaginationMnpNext.classList.remove('pointer-none');
        }
        document.getElementById(
            'mnp-curent-page'
        ).innerHTML = `trang ${pagination.currentPage} ( ${pagination.end}/`;
        const payload = new URLSearchParams();
        payload.set('limit', `${pagination.start},${pagination.itemPerPage}`);
        fetch('http://localhost/admin/manager-product/show-product', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => {
                const container = document.getElementById(
                    'container-show-product'
                );
                const products = data.data;
                const value = elementHTML`
                  ${products.map((product) => {
                      return `
                    
                 <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="">
                                <img src="http://localhost/assets/Db_img/${product.MainImage}" alt="" width="50px" height="50px" style="object-fit: cover;">
                            </td>
                            <td class="text-product">
                              ${product.name}</td>
                            <td class="">
                                ${product.price}.000 đ
                            </td>
                            <td class="">${product.quantity}</td>
                            <td>
                                <button class="button-action-mnProduct" 
                                onclick = "handleButtonActionShowProduct(this)"
                                id="button-show-product-action" data-product="${product.product_id}">thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                    `;
                  })}
                `;
                container.innerHTML = value;
            });
    });
    buttonPaginationMnpNext = document.getElementById(
        'btn-pagination-mnp-next'
    );
    // button next pagination
    buttonPaginationMnpNext.addEventListener('click', () => {
        if (pagination.end === pagination.totalProduct) {
            return;
        }
        pagination.currentPage = pagination.currentPage + 1;
        pagination.start =
            (pagination.currentPage - 1) * pagination.itemPerPage;
        pagination.end = pagination.currentPage * pagination.itemPerPage;
        if (pagination.end > pagination.totalProduct) {
            pagination.end = pagination.totalProduct;
            buttonPaginationMnpNext.classList.add('pointer-none');
        }
        if (
            pagination.start > 0 &&
            buttonPagiantionMnpPrev.classList.contains('pointer-none')
        ) {
            buttonPagiantionMnpPrev.classList.remove('pointer-none');
        }
        document.getElementById(
            'mnp-curent-page'
        ).innerHTML = `trang ${pagination.currentPage} ( ${pagination.end}/`;
        const payload = new URLSearchParams();
        payload.set('limit', `${pagination.start},${pagination.itemPerPage}`);
        fetch('http://localhost/admin/manager-product/show-product', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => {
                const container = document.getElementById(
                    'container-show-product'
                );
                const products = data.data;
                const value = elementHTML`
                  ${products.map((product) => {
                      return `
                    
                 <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="">
                                <img src="http://localhost/assets/Db_img/${product.MainImage}" alt="" width="50px" height="50px" style="object-fit: cover;">
                            </td>
                            <td class="">
                              ${product.name}</td>
                            <td class="">
                                ${product.price}.000 đ
                            </td>
                            <td class="">${product.quantity}</td>
                            <td>
                                <button class="button-action-mnProduct" 
                                onclick = "handleButtonActionShowProduct(this)"
                                id="button-show-product-action" data-product="${product.product_id}">thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                    `;
                  })}
                `;
                container.innerHTML = value;
            });
    });
};
const paginationTitle = document.getElementById('title-pagination');
if (paginationTitle) {
    paginationPage();
    const formSearchProduct = document.getElementById(
        'mnp-form-search-product'
    );
    const inputSearchProduct = document.getElementById(
        'mnp-input-search-product'
    );
    inputSearchProduct.focus();
    inputSearchProduct.addEventListener(
        'input',
        useDebounce(() => {
            const fromData = new FormData(formSearchProduct);
            const payload = new URLSearchParams(fromData);
            console.log(payload.get('category'));
            console.log(payload.get('searchKey'));
            if (payload.get('searchKey').length === 0) {
                window.location.reload();
            }
            fetch('http://localhost/admin/manager-product/search-product', {
                method: 'post',
                body: payload,
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success === false) {
                        return;
                    }
                    const container = document.getElementById(
                        'container-show-product'
                    );
                    document
                        .getElementById('pagination-bottom-wrapper')
                        .classList.add('hidden');
                    const products = data.data;
                    const value = elementHTML`
                  ${products.map((product) => {
                      return `
                    
                 <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="">
                                <img src="http://localhost/assets/Db_img/${product.MainImage}" alt="" width="50px" height="50px" style="object-fit: cover;">
                            </td>
                            <td class="">
                              ${product.name}</td>
                            <td class="">
                                ${product.price}.000 đ
                            </td>
                            <td class="">${product.quantity}</td>
                            <td>
                                <button class="button-action-mnProduct" 
                                onclick = "handleButtonActionShowProduct(this)"
                                id="button-show-product-action" data-product="${product.product_id}">thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>

                    `;
                  })}
                `;
                    container.innerHTML = value;
                });
        }),
        500
    );
}
// ================manager user page =======================
const buttonShowInforCustomer = document.querySelectorAll(
    '#button-action-show-user'
);
if (buttonShowInforCustomer) {
    buttonShowInforCustomer.forEach((ele) => {
        ele.addEventListener('click', (e) => {
            const userId = e.target.getAttribute('data-user');
            localStorage.setItem(
                'manager-user-show-userId',
                JSON.stringify(userId)
            );
            window.location.href =
                'http://localhost/admin/managerCustomer/showInfoUser';
        });
    });
}
