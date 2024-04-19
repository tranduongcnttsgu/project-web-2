const getData = async () => {
    const req = await fetch('http://localhost/product-lists');
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
    prevData: await getData(),
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
            const payload = new URLSearchParams(new FormData(args[0]));

            try {
                const response = await fetch('http://localhost/product', {
                    method: 'post',
                    body: payload,
                    headers: {
                        'Content-Type':
                            'application/x-www-form-urlencoded; charset=UTF-8',
                    },
                });

                const result = await response.json();

                if (result.success) {
                    const newState = result.data;

                    return {
                        ...state,
                        data: newState,
                    };
                }
            } catch (error) {
                console.error('Error:', error);
            }

            return {
                ...state,
            };
        }
        case 'user/searchCategory': {
            const categoryId = args[0].getAttribute('category');
            const payload = new URLSearchParams();
            payload.set('category', categoryId);
            const res = await fetch('http://localhost/product-category', {
                method: 'post',
                body: payload,
                headers: {
                    'Content-Type':
                        'application/x-www-form-urlencoded; charset=UTF-8',
                },
            });
            const result = await res.json();
            if (result.success) {
                return {
                    ...state,
                    data: result.data,
                };
            }

            return {
                ...state,
            };
        }
        case 'user/searchSort': {
            const sort = args[0];
            const prevData = state.data;
            const newData = prevData.sort((a, b) => {
                if (sort === 'increase') {
                    return parseFloat(a.price) - parseFloat(b.price);
                } else return parseFloat(b.price) - parseFloat(a.price);
            });
            return {
                ...state,
                data: newData,
            };
        }
        case 'user/searchAuthor': {
            const authorId = args[0].getAttribute('author');
            const payload = new URLSearchParams();
            payload.set('author', authorId);
            const res = await fetch('http://localhost/product-author', {
                method: 'post',
                body: payload,
                headers: {
                    'Content-Type':
                        'application/x-www-form-urlencoded; charset=UTF-8',
                },
            });
            const result = await res.json();
            if (result.success) {
                return {
                    ...state,
                    data: result.data,
                };
            }

            return {
                ...state,
            };
        }
        case 'user/searchPriceSelect': {
            const price = args[0].firstElementChild.value.split('-');
            const price_start = price[0];
            const price_end = price[1];
            const prevData = state.prevData;
            const newData = prevData.filter((item) => {
                return +item.price <= +price_end && +item.price >= +price_start;
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
                MessageBox('thông báo', 'đã thêm sản phẩm vào giỏ hàng');

                newCart = await getCart();
            } else if (!result.success && result.code === 404) {
                MessageBox(
                    'thông báo',
                    'sản phẩm đã có trong giỏ hàng',
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
                MessageBox('thông báo', 'đã thêm sản phẩm vào giỏ hàng');

                newCart = await getCart();
            } else if (!result.success && result.code === 404) {
                MessageBox(
                    'thông báo',
                    'sản phẩm đã có trong giỏ hàng',
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
                    message: 'bạn muốn đăng xuất',
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
            const productId = +args[0];
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
        case 'user/popup/cartProduct': {
            const prev = state.popup;
            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'xóa sản phẩm ra khỏi giỏ hàng ?',
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
                    'thông báo',
                    'bạn chưa chọn sản phẩn nào',
                    'wraning'
                );
            } else {
                window.location.href = 'http://localhost/checkout/payment';
            }

            return {
                ...state,
            };
        }
        default:
            return state;
    }
};
export default reducer;
