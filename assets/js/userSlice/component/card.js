import html from '../../redux/core.js';
import { connect } from '../setup.js';
const connector = connect((state) => {
    return { data: state.data };
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
           <li class="listProduct-item-product">
    <div class="listProduct-product">
        <img src="${product.MainImage}" alt="" />
        <div class="content-product">
            <span class="product-star"
                ><i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <h2 class="product-title">${product.name}</h2>
            <h2 class="product-price">
                <span class="sell-price"
                    >${formatPrice(product.promo_price)}</span
                >
                <span class="current-price"
                    >${formatPrice(product.price)}</span
                >
            </h2>
            <div class="product-option">
                <div class="product-option-top">
                    <div class="like-product">
                        <span> <i class="fa-regular fa-heart"></i></span>
                    </div>
                    <div
                        class="detail-product"
                        onclick='dispatch("user/detailProduct",${
                            product.product_id
                        })'
                    >
                        <span><i class="fa-regular fa-eye"></i></span>
                    </div>
                </div>
                <div class="product-option-bottom">
                    <button class="product-option-button"
                     onclick = "dispatch('user/addProduct',${
                         product.product_id
                     })"
                    >
                        <i class="fa-solid fa-cart-shopping"></i> thêm vào giỏ
                        hảng
                    </button>
                </div>
            </div>
        </div>
    </div>
</li>
        
        `;
        })}
    `;
};
export default connector(card);
