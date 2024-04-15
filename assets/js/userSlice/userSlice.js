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
            const quantity = currentProduct.quantity_buy | 1;
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
                const item = state.data.filter(
                    (product) => product.product_id === productId
                );
                newCart = [
                    ...state.cart,
                    { ...item[0], quantity_purchased: quantity },
                ];
            } else if (!result.success && result.code == 404) {
                MessageBox(
                    'thông báo',
                    'sản phẩm đã có trong giỏ hàng',
                    'warning'
                );
            }

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
                const item = state.data.filter(
                    (product) => product.product_id === productId
                );

                newCart = [
                    ...state.cart,
                    { ...item[0], quantity_purchased: quantity },
                ];
            } else if (!result.success && result.code == 404) {
                MessageBox(
                    'thông báo',
                    'sản phẩm đã có trong giỏ hàng',
                    'warning'
                );
            }

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
            const checked = !state.orders.statusChecked;
            let newState = { ...state.orders, statusChecked: checked };
            const listProduct = state.cart;
            const newOrder = [];
            if (checked) {
                listProduct.map((product) => {
                    newOrder.push(product.product_id);
                });
            }
            newState = { ...newState, data: newOrder };
            return {
                ...state,
                orders: newState,
            };
        }
        case 'user/cartProduct/addoneOrder': {
            const productId = +args[0];
            const prevOrder = state.orders.data;
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
            console.log(res.data);
            const newOrder = {
                ...state.orders,
                data: [...prevOrder, res.data],
            };

            const newState = { ...state.orders };
            return {
                ...state,
                orders: newOrder,
            };
        }
        case 'user/cartProduct/delete': {
            const productId = +args[0];
            const prevCart = state.cart;
            const prevOrder = state.orders.data;
            const newCart = prevCart.filter((product) => {
                return product.product_id !== productId;
            });
            const newOrder = prevOrder.filter((id) => id !== productId);
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
            const newState = {
                ...state,
                cart: newCart,
                orders: { ...state.orders, data: newOrder },
                popup: newPopup,
            };

            return {
                ...newState,
            };
        }

        case 'user/cart/order': {
            const check = state.orders.data.length === 0;
            if (check) {
                MessageBox(
                    'thông báo',
                    'bạn chưa chọn sản phẩn nào',
                    'wraning'
                );
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
