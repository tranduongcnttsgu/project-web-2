import html from '../../redux/core.js';
import { connect } from '../setup.js';
const connector = connect((state) => {
    return { data: state.ordersDetail };
});
const card = ({ data }) => {
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    return html`
        ${data.map((product) => {
            return `
               <li class="item-product-order">
                    <img src="http://localhost/assets/Db_img/${
                        product.product_image
                    }" alt="" class="img-product-order">
                    <div class="title-product-order">${
                        product.product_name
                    } x ${product.quantity}</div>
                    <div class="price-product-order">${formatPrice(
                        product.price * product.quantity
                    )}</div>
                </li>
            `;
        })}
    `;
};
export default connector(card);
