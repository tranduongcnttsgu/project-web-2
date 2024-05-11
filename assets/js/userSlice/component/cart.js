import html from '../../redux/core.js';
import { connect } from '../setup.js';
const connector = connect((state) => {
    return { data: state.cart };
});
const cart = ({ data }) => {
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    // const totalPrice = data.reduce((total, product) => {
    //     const quantity = product.quantity_purchased ?? 1;
    //     return total + parseInt(product.promo_price * quantity);
    // }, 0);
    const totalPrice = 0;
    return html`
        <div>
            sản phẩm:<span
                id="totail-product"
                style="color: red; font-weight: 600"
                ;
                >${data.length}</span
            >
        </div>
    `;
};
export default connector(cart);
const getTotailPriceOrder = connect((state) => ({
    data: state.orders.data,
}));
const showTotalPriceOrder = ({ data }) => {
    const totalPrice = data.totail_price ?? 0;
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    return html`
        <div class="payment-content-top">
            <h2 class=" transport-title transport-title-second ">Tạm tính :</h2>
            <span class="payment-price">${formatPrice(totalPrice)}</span>
        </div>
        <div class="payment-content-top">
            <h2 class=" transport-title transport-title-second ">Tổng Tiền:</h2>
            <span class="payment-totail-price">${formatPrice(totalPrice)}</span>
        </div>
        <button
            class="button-buy-product"
            onclick="dispatch('user/cart/order')"
        >
            đặt hàng(${data.totail_product})
        </button>
    `;
};
const showPrice = getTotailPriceOrder(showTotalPriceOrder);
export { showPrice };
