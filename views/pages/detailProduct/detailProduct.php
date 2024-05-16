<style>

</style>
<section class="detail-container">
    <section class="container-left-wrapper " id="rootProductDetailLeft"></section>

    <section class="container-right">
        <div class="container-right-logo">
            <img src="http://localhost/assets/img/logo.png" alt="logo" />
            <span>Mua hàng trực tuyến an toàn</span>
        </div>

        <div class="container-right-middle">
            <h1 class="container-right-middle-title">Số lượng:</h1>
            <div id="rootProductDetailRight"></div>
            <div class="container-right-middle">
                <button class="button-buy" id="button-product-detail-buy-now">Mua ngay</button>
                <button class="button-add-to-cart" onclick="dispatch('user/detail/addProduct')">
                    Thêm vào giỏ hàng
                    <i class="fa-solid fa-basket-shopping"></i>
                </button>
            </div>
    </section>
</section>