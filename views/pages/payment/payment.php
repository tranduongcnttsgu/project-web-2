<section class="payment-wrapper">
    <div class="payment-content-left">
        <?php
        require_once __DIR__ . "/paymentLeft.php";
        ?>
    </div>
    <div class="payment-content-right">
        <div class="order-wrapper">
            <h2 class="contact-title">Thông tin sản phẩm</h2>
            <ul class="list-product-order" id="list-product-order">

            </ul>
            <div class="order-wrapper-bottom" id="button-payment-order">

            </div>
            <div>
                <button class="button-payment" id="button-payment">
                    đặt hàng
                </button>
            </div>
        </div>
    </div>
</section>
<script type="module" src="http://localhost/assets/js/payment.js"></script>