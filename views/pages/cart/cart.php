<section class="cart-wrapper">
    <h1 class="cart-title">
        Giỏ Hàng
    </h1>
    <div class="cart-container">
        <div class="cart-container-left">
            <div class="cart-content-left-header">
                <div class="cart-content-title">

                    <label for="buyProduct" class="cart-title-text-1">
                        <input type="checkbox" name="product-buy" id="buyProduct" onchange="dispatch('user/cartProduct/addManyorder',0)">
                        <span class="cart-title-text"> Tất cả sản phẩm</span>
                    </label>
                    <span class="cart-title-text cart-title-text-2">Đơn giá</span>
                    <span class="cart-title-text cart-title-text-3">Số lượng</span>
                    <span class="cart-title-text cart-title-text-4">Thành Tiền</span>
                    <div class="space "></div>
                </div>
                <div class="cart-content-product-lists" id="rootCartShowListProduct">

                </div>
            </div>
        </div>
        <div class="cart-container-right">
            <div class="transport-wrapper">
                <div class="transport-content-top">
                    <h2 class=" transport-title">
                        Giao tới
                    </h2>
                    <span class="button-change-address">Thay đổi</span>
                </div>
                <div class="transport-content-bottom">
                    <div class="transport-infor">
                        <h2 class=" transport-title transport-title-second ">
                            user name
                        </h2>
                        <span class="transport-phone-number">942834942</span>
                    </div>
                    <div class="transport-address">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, non repellendus! Voluptas rem cupiditate eius a earum, ullam perspiciatis pariatur
                    </div>
                </div>
            </div>
            <div class="payment-wrapper" id="rootPaymentCart">

            </div>
        </div>
    </div>

</section>