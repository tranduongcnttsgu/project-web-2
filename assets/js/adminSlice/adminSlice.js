const init = {
    data: [],
    popup: {
        type: '',
        acceptType: '',
        show: false,
        accept: false,
        message: '',
        payload: [],
    },
};
const reducer = async (state = init, action, args) => {
    switch (action) {
        case 'admin/popup': {
            const prev = state.popup;
            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'bạn muốn đăng xuất',
                    type: 'admin/popup',
                    acceptType: 'admin/logout',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/logout': {
            const req = await fetch('http://localhost/account/logout');
            const res = await req.json();
            window.location.href = 'http://localhost';
            const newPopup = {
                type: '',
                acceptType: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/delete/account/popup': {
            const prev = state.popup;

            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                const userId = args[1].getAttribute('data-account');
                localStorage.setItem('id', JSON.stringify(userId));
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'bạn xóa tài khoản ',
                    type: 'admin/delete/account/popup',
                    acceptType: 'admin/delete/account',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/delete/account': {
            const id = localStorage.getItem('id')
                ? JSON.parse(localStorage.getItem('id'))
                : false;
            if (id) {
                const payload = new URLSearchParams();
                payload.set('userId', id.trim());
                const req = await fetch(
                    'http://localhost/admin/deleteAccount',
                    {
                        method: 'post',
                        body: payload,
                    }
                );
                const res = await req.json();
                if (res.success) {
                    window.location.reload();
                } else {
                    MessageBox('xóa tài khoản không thành công', 'thông báo');
                }
            }
            localStorage.removeItem('id');
            const newPopup = {
                type: '',
                acceptType: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };

            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/edit/account': {
            const userId = args[0].getAttribute('data-account').trim();
            localStorage.setItem('userId', JSON.stringify(userId));
            window.location.href = 'http://localhost/admin/adminEditAccount';
            return state;
        }
        case 'admin/order/popup/delete-order': {
            const prev = state.popup;

            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'xóa đơn hàng ',
                    type: 'admin/order/popup/delete-order',
                    acceptType: 'admin/delete/order',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/delete/order': {
            const status = 'đơn hàng bị hủy';
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
            const newPopup = {
                type: '',
                acceptType: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/manager-product/popup/delete-product': {
            const prev = state.popup;

            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'xóa sản phẩm ',
                    type: 'admin/manager-product/popup/delete-product',
                    acceptType: 'admin/delete/product',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/delete/product': {
            const id = localStorage.getItem('ad-manager-productId')
                ? JSON.parse(localStorage.getItem('ad-manager-productId'))
                : false;
            if (id) {
                const payload = new URLSearchParams();
                payload.set('productId', id.trim());
                const req = await fetch(
                    'http://localhost/admin/manager-product/delete',
                    {
                        method: 'post',
                        body: payload,
                    }
                );
                const res = await req.json();
                if (res.success) {
                    window.location.href =
                        'http://localhost/admin/manager/products';
                } else {
                    MessageBox('xóa sản phẩm không thành công', 'thông báo');
                }
            }
            localStorage.removeItem('ad-manager-productId');
            const newPopup = {
                type: '',
                acceptType: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };

            return {
                ...state,
                popup: newPopup,
            };
        }
        default:
            return state;
    }
};
export default reducer;
