import { render, renderOnlyOne } from './setup.js';
import card from './component/card.js';
import cart, { showPrice } from './component/cart.js';
import avatar from './component/user/avatar.js';
import formChangeInfo from './component/user/formChangeInfo.js';
import infoContentLeft from './component/user/infoContentLeft.js';
import popup from './component/popup.js';
import productDetail from './component/product/detailProduct.js';
import detailContentRight from './component/product/detailContentRight.js';
import cartComponent from './component/cart/cartComponent.js';
import payment from './component/payment.js';
import buttonPayment from './buttonPayment.js';

import pagination from './pagination.js';
const containerProduct = document.getElementById('list-product-productpage');
const iconCart = document.getElementById('icon-cart-header');
const userAvatar = document.getElementById('rootUserAvatar');
const formChaneInfoUser = document.getElementById('rootFormUserInfo');
const inforContentLeft = document.getElementById('rootInforContentLeft');
const popupM = document.getElementById('popup');
const contanerProductDetaiLeftl = document.getElementById(
    'rootProductDetailLeft'
);
const contanerProductDetaiRight = document.getElementById(
    'rootProductDetailRight'
);
const containerCartShowListProduct = document.getElementById(
    'rootCartShowListProduct'
);
const elePagination = document.getElementById('pagination');
const contaienrPaymentCart = document.getElementById('rootPaymentCart');
const OrderContaienrListProduct = document.getElementById('list-product-order');
const buttonPaymentOrder = document.getElementById('button-payment-order');

render(containerProduct, card);
render(iconCart, cart);
render(userAvatar, avatar);
render(formChaneInfoUser, formChangeInfo);
render(inforContentLeft, infoContentLeft);
render(popupM, popup);
await renderOnlyOne(contanerProductDetaiLeftl, productDetail);
render(contanerProductDetaiRight, detailContentRight);
render(containerCartShowListProduct, cartComponent);
render(contaienrPaymentCart, showPrice);
render(OrderContaienrListProduct, payment);
render(buttonPaymentOrder, buttonPayment);

render(elePagination, pagination);
