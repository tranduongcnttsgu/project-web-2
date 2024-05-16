import html from '../../../redux/core.js';
import { connect } from '../../setup.js';
const connector = connect((state) => ({
    data: state.cart,
    checked: state.orders.statusChecked,
    order: state.ordersDetail,
}));
const cartComponent = ({ data, checked, order }) => {
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    let statusChecked = false;
    const checkOrder = (id) => {
        statusChecked =
            order.filter((product) => {
                return product.product_id + '' === id + '';
            }).length > 0;
        return statusChecked;
    };
    if (data.length === 0) {
        return html`
            <div class="no-product-title">
                <h3>Không có sản phẩm nào trong giỏ hàng</h3>
            </div>
            <div class="no-product-button">
                <a href="http://localhost/product">
                    <button class="button-to-shopPage">Đến cửa hàng</button></a
                >
            </div>
        `;
    }
    return html` ${data.map(
        (product) => `
          <div class="cart-product-wrapper">
            <div class="cart-content-product">
                <label for="buyProduct-one" class="checkBox-product"
                 
                >
                    <input
                        type="checkbox"
                        name="buyProduct"
                        id="buyProductOne"
                        ${checkOrder(product.product_id) ? 'checked' : ''}
                        onclick="handleAddProductOrder(this,${
                            product.product_id
                        })"
                    />
                </label>
                <div class="cart-product-image">
                    <img
                        src="http://localhost/assets/Db_img/${
                            product.MainImage
                        }"
                        alt=""
                    />
                </div>
                <div class="cart-product-title">
                   ${product.name}
                </div>
            </div>
            <div class="cart-porduct-price">${formatPrice(
                +product.promo_price
            )}</div>
            <div class="cart-product-wrapper-action-button">
                <div class="cart-product-quantity">
                 <button class="decrease-quantity
                    ${
                        checkOrder(product.product_id)
                            ? 'visibility-hidden'
                            : 'visibility-visible'
                    }
                 "
                 ${
                     product.quantity_purchased === 1
                         ? "style=' pointer-events: none;'"
                         : "style=' pointer-events: auto;'"
                 }
                 
                   onclick = "dispatch('user/cartProduct/quantity',-1,${
                       product.product_id
                   })" 
                >-</button>
               
                <div class="product-quantity"
                 
                >${product.quantity_purchased}</div>
                <button class="increase-quantity"
                 ${
                     checkOrder(product.product_id)
                         ? "style='  visibility: hidden;'"
                         : "style=' visibility:visible;'"
                 }
                onclick = "dispatch('user/cartProduct/quantity',1,${
                    product.product_id
                })" 
                >+</button>
               </div>
                   <div class="cart-product-totail-price">${formatPrice(
                       product.quantity_purchased * product.promo_price
                   )}</div>
            </div>
            <div class="cart-product-delete
              ${
                  checkOrder(product.product_id)
                      ? 'visibility-hidden'
                      : 'visibility-visible'
              }
            "
              onclick="dispatch('user/popup/cartProduct',1,${
                  product.product_id
              })"
            >x</div>
        </div>
       `
    )}`;
};
export default connector(cartComponent);
