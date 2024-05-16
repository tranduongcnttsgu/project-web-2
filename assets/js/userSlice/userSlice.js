const getData = async (start = 0, size = 6) => {
    const payload = new URLSearchParams();
    payload.set('start', start);
    payload.set('end', size);
    const res = await fetch('http://localhost/product', {
        method: 'post',
        body: payload,
    });
    const data = await res.json();
    return data.data;
};
const getTotalProduct = async () => {
    const payload = new URLSearchParams();

    const res = await fetch('http://localhost/total-product', {
        method: 'get',
    });
    const data = await res.json();
    return data.data;
};
const getSearchData = async (
    search,
    start,
    size,
    condition = false,
    sort = false
) => {
    const payload = new URLSearchParams();
    payload.set('limit', start + ', ' + size);
    payload.set('searchKey', search);
    payload.set('condition', condition);
    payload.set('sort', sort);
    const req = await fetch('http://localhost/user/search', {
        method: 'post',
        body: payload,
    });
    const res = await req.json();
    return res;
};
const getCart = async () => {
    const req = await fetch('http://localhost/product-cart');
    const res = await req.json();

    return res.data;
};
const getUser = async () => {
    const req = await fetch('http://localhost/account/user-info-login');
    const res = await req.json();
    return res.data.data;
};
const getDetailProduct = async () => {
    const productId = JSON.parse(localStorage.getItem('showProductId'));
    if (!productId) {
        return {};
    }
    const payload = new URLSearchParams();
    payload.set('productId', productId);
    const req = await fetch('http://localhost/product-detail', {
        method: 'post',
        body: payload,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
        },
    });
    const res = await req.json();
    return { ...res.data, quantity_buy: 1 };
};
const getOrders = async () => {
    const req = await fetch('http://localhost/orders');
    const res = await req.json();
    return res.data;
};
const getOrderDetail = async () => {
    const req = await fetch('http://localhost/orderDetail');
    const res = await req.json();
    return res.data;
};
const getUserOrder = async () => {
    const res = await fetch('http://localhost/user/get/user-order');
    const data = await res.json();
    return data.data;
};
const init = {
    data: await getData(),
    searchData: [],
    searchKey: '',
    conditionSearch: false,
    sortCondition: false,
    pagination: {
        itemPerPage: 6,
        currentPage: 1,
        start: 0,
        end: 6,
        totalProduct: await getTotalProduct(),
        totalPage: 1,
    },
    cart: await getCart(),
    userData: await getUser(),
    popup: {
        type: '',
        acceptType: '',
        show: false,
        accept: false,
        message: '',
        payload: [],
    },
    detailProduct: await getDetailProduct(),
    orders: { statusChecked: false, data: await getOrders() },
    ordersDetail: await getOrderDetail(),
    userOrder: await getUserOrder(),
};
const reducer = async (state = init, action, args) => {
    switch (action) {
        case 'user/search': {
            const form = args[0];
            const payload = new URLSearchParams(form);
            let newPagiantion = {
                itemPerPage: 6,
                currentPage: 1,
                start: 0,
                end: 6,
                totalProduct: 0,
                totalPage: 1,
            };
            const res = await getSearchData(
                payload.get('searchKey'),
                newPagiantion.start,
                newPagiantion.itemPerPage,
                state.conditionSearch,
                state.sortCondition
            );
            console.log(res);
            const totalPage = Math.ceil(
                res.data.totalResult / newPagiantion.itemPerPage
            );
            newPagiantion = {
                ...newPagiantion,
                totalProduct: res.data.totalResult,
                totalPage: totalPage,
            };
            const newSearchData = res.data.data;
            return {
                ...state,
                pagination: newPagiantion,
                data: newSearchData,
                searchData: newSearchData,
                searchKey: payload.get('searchKey'),
            };
        }
        case 'user/nextPage': {
            const currentPage = state.pagination.currentPage + 1;
            const start = (currentPage - 1) * state.pagination.itemPerPage;
            let end = currentPage * state.pagination.itemPerPage;
            if (end > state.pagination.totalProduct) {
                end = state.pagination.totalProduct;
            }
            const newPage = {
                ...state.pagination,
                currentPage: currentPage,
                start: start,
                end: end,
            };
            let newData;
            if (state.searchData.length === 0) {
                newData = await getData(start, state.pagination.itemPerPage);
            } else {
                newData = await getSearchData(
                    state.searchKey,
                    start,
                    state.pagination.itemPerPage,
                    state.conditionSearch,
                    state.sortCondition
                );
                newData = newData.data.data;
            }
            return {
                ...state,
                data: newData,
                pagination: newPage,
            };
        }
        case 'user/prevPage': {
            const currentPage = state.pagination.currentPage - 1;
            const start = (currentPage - 1) * state.pagination.itemPerPage;
            const end = currentPage * state.pagination.itemPerPage;
            const newPage = {
                ...state.pagination,
                currentPage: currentPage,
                start: start,
                end: end,
            };
            let newData;
            if (state.searchData.length === 0) {
                newData = await getData(start, state.pagination.itemPerPage);
            } else {
                newData = await getSearchData(
                    state.searchKey,
                    start,
                    state.pagination.itemPerPage,
                    state.conditionSearch,
                    state.sortCondition
                );

                newData = newData.data.data;
            }
            return {
                ...state,
                data: newData,
                pagination: newPage,
            };
        }
        case 'user/changePage': {
            const currentPage = +args[0];
            const start = (currentPage - 1) * state.pagination.itemPerPage;
            let end = currentPage * state.pagination.itemPerPage;
            if (end > state.pagination.totalProduct) {
                end = state.pagination.totalProduct;
            }
            const newPage = {
                ...state.pagination,
                currentPage: currentPage,
                start: start,
                end: end,
            };
            let newData;
            if (state.searchData.length === 0) {
                newData = await getData(start, state.pagination.itemPerPage);
            } else {
                newData = await getSearchData(
                    state.searchKey,
                    start,
                    state.pagination.itemPerPage,
                    state.conditionSearch,
                    state.sortCondition
                );

                newData = newData.data.data;
            }
            return {
                ...state,
                data: newData,
                pagination: newPage,
            };
        }
        case 'user/searchCategory': {
            const index = args[0];
            console.log(index.parentElement.children);
            const li = [...index.parentElement.children];
            li.forEach((ele) => {
                ele.classList.remove('active');
            });
            index.classList.add('active');
            const value = index.getAttribute('category');
            state.conditionSearch = 'category:' + value;
            if (value === 'false') {
                state.conditionSearch = false;
            }
            let newPagiantion = {
                itemPerPage: 6,
                currentPage: 1,
                start: 0,
                end: 6,
                totalProduct: 0,
                totalPage: 1,
            };
            const res = await getSearchData(
                '',
                newPagiantion.start,
                newPagiantion.itemPerPage,
                state.conditionSearch,
                state.sortCondition
            );

            const totalPage = Math.ceil(
                res.data.totalResult / newPagiantion.itemPerPage
            );

            newPagiantion = {
                ...newPagiantion,
                totalProduct: res.data.totalResult,
                totalPage: totalPage,
            };
            const newSearchData = res.data.data;
            return {
                ...state,
                pagination: newPagiantion,
                data: newSearchData,
                searchData: newSearchData,
                searchKey: '',
            };
        }
        case 'user/searchAuthor': {
            const index = args[0];
            console.log(index.parentElement.children);
            const li = [...index.parentElement.children];
            li.forEach((ele) => {
                ele.classList.remove('active');
            });
            index.classList.add('active');
            const value = index.getAttribute('author');
            state.conditionSearch = 'author:' + value;
            if (value === 'false') {
                state.conditionSearch = false;
            }
            let newPagiantion = {
                itemPerPage: 6,
                currentPage: 1,
                start: 0,
                end: 6,
                totalProduct: 0,
                totalPage: 1,
            };
            const res = await getSearchData(
                '',
                newPagiantion.start,
                newPagiantion.itemPerPage,
                state.conditionSearch,
                state.sortCondition
            );

            const totalPage = Math.ceil(
                res.data.totalResult / newPagiantion.itemPerPage
            );

            newPagiantion = {
                ...newPagiantion,
                totalProduct: res.data.totalResult,
                totalPage: totalPage,
            };
            const newSearchData = res.data.data;
            return {
                ...state,
                pagination: newPagiantion,
                data: newSearchData,
                searchData: newSearchData,
                searchKey: '',
            };
        }
        case 'user/sortProductPrice': {
            const index = args[0];
            state.sortCondition = index.value;
            if (index.value === 'false') {
                state.sortCondition = false;
            }
            let newPagiantion = {
                itemPerPage: 6,
                currentPage: 1,
                start: 0,
                end: 6,
                totalProduct: 0,
                totalPage: 1,
            };
            const res = await getSearchData(
                state.searchKey,
                newPagiantion.start,
                newPagiantion.itemPerPage,
                state.conditionSearch,
                state.sortCondition
            );

            const totalPage = Math.ceil(
                res.data.totalResult / newPagiantion.itemPerPage
            );

            newPagiantion = {
                ...newPagiantion,
                totalProduct: res.data.totalResult,
                totalPage: totalPage,
            };
            const newSearchData = res.data.data;
            return {
                ...state,
                pagination: newPagiantion,
                data: newSearchData,
                searchData: newSearchData,
            };
        }
        case 'user/sortProduct': {
            const sort = args[0];
            const prevData = state.data;
            const newData = prevData.sort((a, b) => {
                if (sort === 'increase') {
                    return (
                        parseFloat(a.promo_price) - parseFloat(b.promo_price)
                    );
                } else
                    return (
                        parseFloat(b.promo_price) - parseFloat(a.promo_price)
                    );
            });
            return {
                ...state,
                data: newData,
            };
        }
        case 'user/detail/addProduct': {
            const currentProduct = state.detailProduct;
            const productId = currentProduct.product_id
                ? currentProduct.product_id
                : args[0];
            const quantity = currentProduct.quantity_buy;
            const payload = new URLSearchParams();
            payload.set('productId', productId);
            payload.set('quantity', quantity);
            const res = await fetch('http://localhost/user/addProductToCart', {
                method: 'post',
                body: payload,
                headers: {
                    'Content-Type':
                        'application/x-www-form-urlencoded; charset=UTF-8',
                },
            });
            const result = await res.json();
            let newCart = [...state.cart];
            if (result.success) {
                MessageBox('thông báo', 'Đã thêm sản phẩm vào giỏ hàng');

                newCart = await getCart();
            } else if (!result.success && result.code === 401) {
                window.location.href = 'http://localhost/account';
            } else if (!result.success && result.code === 404) {
                MessageBox(
                    'thông báo',
                    'Sản phẩm đã có trong giỏ hàng',
                    'warning'
                );
            }
            console.log(result);

            return {
                ...state,
                cart: newCart,
            };
        }
        case 'user/addProduct': {
            const productId = +args[0];
            const quantity = 1;
            const payload = new URLSearchParams();
            payload.set('productId', productId);
            payload.set('quantity', quantity);
            const res = await fetch('http://localhost/user/addProductToCart', {
                method: 'post',
                body: payload,
                headers: {
                    'Content-Type':
                        'application/x-www-form-urlencoded; charset=UTF-8',
                },
            });
            const result = await res.json();
            let newCart = [...state.cart];
            if (result.success) {
                MessageBox('thông báo', 'Đã thêm sản phẩm vào giỏ hàng');

                newCart = await getCart();
            } else if (!result.success && result.code === 401) {
                window.location.href = 'http://localhost/account';
            } else if (!result.success && result.code === 404) {
                MessageBox(
                    'Thông báo',
                    'Sản phẩm đã có trong giỏ hàng',
                    'warning'
                );
            }
            console.log(result);

            return {
                ...state,
                cart: newCart,
            };
        }
        case 'user/logout': {
            const prev = state.popup;
            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'Bạn muốn đăng xuất',
                    type: 'user/logout',
                    acceptType: 'user/logout',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = { ...prev, show: false };
            } else if (+args[0] === 3) {
                const req = await fetch('http://localhost/account/logout');
                const res = await req.json();

                const newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
                window.location.href = 'http://localhost';

                return {
                    ...state,
                    popup: newPopup,
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'user/detailProduct': {
            const productId = args[0];
            localStorage.setItem('showProductId', JSON.stringify(productId));

            window.location.href = 'http://localhost/detail-product';
            return {
                ...state,
            };
        }
        case 'user/detailProduct/quantity': {
            const quantity = +args[0];
            const newQuantity = state.detailProduct.quantity_buy + quantity;
            const newState = {
                ...state.detailProduct,
                quantity_buy: newQuantity,
            };
            return {
                ...state,
                detailProduct: newState,
            };
        }
        case 'user/productDetal/buy': {
            const productId = args[0];
            const check = state.cart.some((product) => {
                return product.product_id === productId;
            });
            const payload = { check, data: state.detailProduct };

            const req = await fetch(
                'http://localhost/user/product-detail/order',
                {
                    method: 'post',
                    body: JSON.stringify(payload),
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                    },
                }
            );
            const res = await req.json();
            if (res.success) {
                window.location.href = 'http://localhost/checkout/payment';
            }
            return state;
        }
        case 'user/popup/cartProduct': {
            const prev = state.popup;
            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'Xóa sản phẩm ra khỏi giỏ hàng ?',
                    payload: [args[1]],
                    type: 'user/popup/cartProduct',
                    acceptType: 'user/cartProduct/delete',
                };
            } else if (+args[0] === 2) {
                newPopup = { ...prev, show: false, payload: [] };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'user/cartProduct/quantity': {
            const quantity = +args[0];

            const produdctId = args[1];
            const cart = state.cart;
            const newState = cart.map((product) => {
                if (product.product_id === produdctId) {
                    const newQuantity = product.quantity_purchased + quantity;
                    return {
                        ...product,
                        quantity_purchased: newQuantity,
                    };
                } else {
                    return product;
                }
            });
            return {
                ...state,
                cart: newState,
            };
        }
        case 'user/cartProduct/addManyorder': {
            const lists = [];
            state.cart.map((product) => {
                if (state.ordersDetail.length === 0) {
                    lists.push(product);
                } else {
                    state.ordersDetail.map((item) => {
                        if (item.product_id !== product.product_id) {
                            lists.push(product);
                        }
                    });
                }
            });
            if (lists.length === 0) {
                return state;
            }
            const req = await fetch(
                'http://localhost/user/addManyProductToOrder',
                {
                    method: 'post',
                    body: JSON.stringify({ data: lists }),
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                    },
                }
            );
            const response = await req.json();
            const newOrderDetail = await getOrderDetail();
            const newOrder = await getOrders();
            return {
                ...state,
                orders: { ...state.orders, data: newOrder },
                ordersDetail: newOrderDetail,
            };
        }
        case 'user/cartProduct/deleteManyOrder': {
            const req = await fetch('/user/deleteManyProductToOrder', {
                method: 'post',
            });

            const newOrderDetail = await getOrderDetail();
            const newOrder = await getOrders();
            return {
                ...state,
                orders: { ...state.orders, data: newOrder },
                ordersDetail: newOrderDetail,
            };
        }
        case 'user/cartProduct/addoneOrder': {
            const productId = +args[0];
            const prevOrder = state.orders;
            const totalProductInOrder = prevOrder.length + 1;
            const product = state.cart.filter((item) => {
                return item.product_id === productId;
            });
            const payload = JSON.stringify({
                data: product[0],
                totalProduct: totalProductInOrder,
            });
            const req = await fetch(
                'http://localhost/add-one-product-to-order',
                {
                    method: 'post',
                    body: payload,
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                    },
                }
            );
            const res = await req.json();

            const newOrder = {
                ...state.orders,
                data: await getOrders(),
            };
            const newOrderDetail = await getOrderDetail();

            return {
                ...state,
                orders: newOrder,
                ordersDetail: newOrderDetail,
            };
        }
        case 'user/cartProduct/deleteoneOrder': {
            const product_id = args[0];
            const payload = new URLSearchParams();
            payload.set('productId', product_id);
            const req = await fetch(
                'http://localhost/delete-one-product-in-order',
                {
                    method: 'post',
                    body: payload,
                }
            );
            const response = await req.json();
            console.log(response);
            if (response.success) {
                const newOrderDetail = await getOrderDetail();
                const newOrder = await getOrders();

                return {
                    ...state,
                    ordersDetail: newOrderDetail,
                    orders: { ...state.orders, data: newOrder },
                };
            }
            return {
                ...state,
            };
        }
        case 'user/cartProduct/delete': {
            const productId = +args[0];

            const payload = new URLSearchParams();
            payload.set('productId', productId);
            const updateCart = await fetch(
                'http://localhost/delete-product-on-cart',
                {
                    method: 'post',
                    body: payload,
                    headers: {
                        'Content-Type':
                            'application/x-www-form-urlencoded; charset=UTF-8',
                    },
                }
            );
            const res = await updateCart.json();
            const newPopup = {
                type: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };
            const newCart = await getCart();
            const newState = {
                ...state,
                cart: newCart,

                popup: newPopup,
            };

            return {
                ...newState,
            };
        }

        case 'user/cart/order': {
            const check = state.ordersDetail.length === 0;
            if (check) {
                MessageBox(
                    'Thông báo',
                    'Bạn chưa chọn sản phẩn nào',
                    'wraning'
                );
            } else {
                window.location.href = 'http://localhost/checkout/payment';
            }

            return {
                ...state,
            };
        }
        case 'user/order/popup/delete-order': {
            const prev = state.popup;

            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'Xóa đơn hàng ',
                    type: 'user/order/popup/delete-order',
                    acceptType: 'user/delete/order',
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
        case 'user/delete/order': {
            const status = 'đơn hàng bị hủy';
            const payload = new URLSearchParams();
            const orderId = JSON.parse(localStorage.getItem('user_OrderId'));
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
                        MessageBox('Cập nhật không thành công', 'thông báo');
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
        default: {
            const newTotalPage = Math.ceil(
                state.pagination.totalProduct / state.pagination.itemPerPage
            );
            return {
                ...state,
                pagination: {
                    ...state.pagination,
                    totalPage: newTotalPage,
                },
            };
        }
    }
};
export default reducer;
