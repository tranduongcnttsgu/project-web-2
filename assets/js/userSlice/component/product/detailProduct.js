import html from '../../../redux/core.js';

const renderContentDetail = (content = [' ', ' ']) => {
    return html`
        ${content.map((item) => {
            return `
           <tr>
             <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            </tr>
        `;
        })}
    `;
};

const productDetail = async () => {
    const renderStar = (number) => {
        const temp = Array.apply(null, { length: +number });
        return html`
            ${temp.map((item) => `  <i class="fa-solid fa-star"></i>`)}
        `;
    };
    const productId = JSON.parse(localStorage.getItem('showProductId'));

    const getDate = async (id) => {
        const payload = new URLSearchParams();
        payload.set('productId', productId);
        const req = await fetch('http://localhost/product-detail', {
            method: 'post',
            body: payload,
            headers: {
                'Content-Type':
                    'application/x-www-form-urlencoded; charset=UTF-8',
            },
        });
        const res = await req.json();
        return res.data;
    };
    const product = await getDate(productId);
    console.log(product);
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    return html`
        <section class="container-left">
            <div class="product-image">
                <img
                    src="http://localhost/assets/Db_img/${product.MainImage}"
                    alt=""
                />
            </div>
            <div class="banner-left">
                <ul class="banner-list">
                    <li class="banner-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>
                            Được hỗ trợ 1 đổi 1 trong 30 ngày nếu có lỗi từ nhà
                            sản xuất</span
                        >
                    </li>
                    <li class="banner-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>
                            Được hỗ trợ 1 đổi 1 trong 30 ngày nếu có lỗi từ nhà
                            sản xuất</span
                        >
                    </li>
                    <li class="banner-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>
                            Được hỗ trợ 1 đổi 1 trong 30 ngày nếu có lỗi từ nhà
                            sản xuất</span
                        >
                    </li>
                </ul>
            </div>
        </section>
        <section section class="container-middle">
            <div class="content-top">
                <h1 class="product-title">${product.name}</h1>
                <div class="product-star">
                    ${renderStar(Math.round(product.rating))}

                    <span>(${product.totail_rating})</span>
                </div>
                <div class="product-totail-buy">
                    đã bán:${product.totail_pay} sản phẩm
                </div>
                <div class="product-quantity">
                    còn lại:${product.quantity} sản phẩm
                </div>
                <h1 class="product-price">
                    <span class="product-price-pr"
                        >${formatPrice(product.price)}</span
                    >${formatPrice(product.promo_price)}
                </h1>
            </div>
            <!-- info product  -->
            <div class="content-middle">
                <h1>thông tin sản phẩm</h1>
                <table id="customers">
                    ${renderContentDetail()}
                </table>
            </div>
            <div class="description-product">
                <h1>mô tả sản phẩm</h1>
                <div>${product.description}</div>
            </div>
        </section>
    `;
};
export default productDetail;
