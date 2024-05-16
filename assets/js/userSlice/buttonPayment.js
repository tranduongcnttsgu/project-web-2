import html from '../redux/core.js';
import { connect } from './setup.js';
const connector = connect((state) => ({
    products: state.orders.data,
}));

const buttonPayment = ({ products }) => {
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    return html`
        <div class="total-price">
            Tổng tiền thanh toán:
            <span>${formatPrice(products.totail_price)}</span>
        </div>
    `;
};
export default connector(buttonPayment);
