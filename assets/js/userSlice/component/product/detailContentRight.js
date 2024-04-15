import { connect } from '../../setup.js';
const connector = connect((state) => ({
    data: state.detailProduct,
}));

const renderContentRight = ({ data }) => {
    const buyProduct = data;
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    console.log(parseInt(buyProduct.quantity_buy));
    return html`
          <div class="button-change-quantity-wrapper">
                <button
                    class="decrease"
                    onclick="dispatch('user/detailProduct/quantity',-1)"
                    ${
                        buyProduct.quantity_buy === 1
                            ? "style=' pointer-events: none;'"
                            : "style=' pointer-events: auto;'"
                    }
                >
                    <i class="fa-solid fa-minus"></i>
                </button>
                <div class="quantity">${buyProduct.quantity_buy}</div>
                <button
                    class="increase"
                    onclick="dispatch('user/detailProduct/quantity',1)"
                >
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="totail-prive">
            <h1 class="totail-prive-title">tạm tính</h1>
            <h1 class="totail-prive-price">
                ${formatPrice(
                    parseInt(buyProduct.quantity_buy) *
                        parseInt(buyProduct.promo_price)
                )}
            </h1>
        </div>
    `;
};
export default connector(renderContentRight);
