<style>
    .selling-container {
        max-width: 1200px;
        height: auto;
        margin: 0 auto;
        margin-top: 10px;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        padding: 5px;
        background: linear-gradient(to bottom, #fcff9e 0%, #c67700 100%);
    }

    .selling-top-content {
        display: flex;
        justify-content: space-between;
        height: 40px;
        text-align: center;
        align-items: center;
    }

    .selling-titile {
        font-size: 16px;
        font-weight: 500;

    }

    .selling-clock {
        display: flex;
        column-gap: 10px;
        padding-right: 10px;
    }

    .selling-clock div {
        padding: 5px;
        background-color: white;
        color: black;
        font-size: 14px;
        border: none;
        border-radius: 10%;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25px;
    }

    .selling-clock-title {
        font-size: 14px;
        margin-right: 10px;
        color: black;
    }

    .selling-bottom-content {
        width: 100%;
        height: 350px;
        margin-top: 10px;
        background-color: transparent;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        scroll-behavior: smooth;
        scroll-snap-type: both;

    }

    .selling-bottom-content::-webkit-scrollbar-track {
        scroll-behavior: smooth;
    }

    .selling-list-product {
        width: 100%;
        height: 100%;
        overflow-x: scroll;
        scroll-behavior: smooth;
        scroll-snap-type: both;
        display: flex;
        padding: 5px 0px 10px 0px;

    }

    .selling-list-product::-webkit-scrollbar {
        height: 5px;
        width: 100%;
    }

    .selling-list-product::-webkit-scrollbar-track {
        background-color: black;
    }

    .selling-list-product::-webkit-scrollbar-thumb {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: aliceblue;
        cursor: pointer;
    }

    .selling-item-product {
        scroll-snap-align: start;
        min-width: calc(100% /5);
        width: calc(100% /5);
        height: 100%;
        padding: 0 5px;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: all .3s ease;

    }

    .selling-product {
        background-color: white;
        height: 100%;
        width: 100%;
        border: none;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        position: relative;

    }

    .selling-precenta {
        position: absolute;
        top: 10px;
        left: 0;
        padding: 10px;
        color: white;
        background-color: red;
        font-size: 14px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .product-option {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-option-top {
        display: flex;
        flex-direction: column;
        row-gap: 5px;
        padding: 10px;
        height: 200px;
        padding-top: 30px;
        padding-left: 300px;
        transition: padding .1s ease-in;
    }

    .selling-product:hover .product-option-top {
        padding-left: 0px;
    }

    .like-product {
        display: flex;
        text-align: end;
        justify-content: flex-end;
    }

    .like-product span {
        display: inline-block;
        padding: 5px;
        background-color: white;
        border: none;
        border-radius: 5px;
        text-align: center;
        border: 1px solid black;
        transition: all .3s ease;
        cursor: pointer;
    }

    .like-product span:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }

    .detail-product {
        display: flex;
        text-align: end;
        justify-content: flex-end;
    }

    .detail-product span {
        display: inline-block;
        padding: 5px;
        background-color: white;
        border: none;
        border-radius: 5px;
        text-align: center;
        border: 1px solid black;
        transition: all .3s ease;
        cursor: pointer;
    }

    .detail-product span:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }

    .product-option-bottom {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
        height: 80px;
        padding-top: 400px;
        padding-left: 10px;
        padding-right: 10px;
        transition: padding .2s ease;
    }

    .selling-product:hover .product-option-bottom {
        padding-top: 20px;
    }

    .selling-product img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        padding: 5px;
    }

    .content-product {
        display: flex;
        flex-direction: column;
        align-items: start;
        width: 100%;
        height: 130px;
        padding-top: 10px;
    }

    .product-star {
        display: flex;
        justify-content: flex-start;
        color: #e7cb62;
        text-align: start;
    }

    .product-title {
        font-size: 14px;
        font-weight: 500;
        outline: none;
    }

    .product-price {
        display: flex;
        column-gap: 10px;
    }

    .sell-price {
        font-size: 12px;
        font-weight: 400;
        display: inline-block;
        position: relative;
        height: fit-content;
        padding: 2px;
    }

    .sell-price::before {
        content: "";
        height: 2px;
        width: 100%;
        background-color: red;
        position: absolute;
        top: 50%;
        left: 0;

    }

    .current-price {
        font-size: 18px;
        font-weight: 700;
        color: red;
    }

    .product-option-button {
        display: inline-block;
        padding: 5px;
        font-size: 14px;
        background: linear-gradient(to bottom, #fcff9e 0%, #c67700 100%);
        color: black;
        font-weight: 500;
        border-radius: 4px;
        user-select: none;
        cursor: pointer;
        position: relative;
        isolation: isolate;
        overflow: hidden;
        border: none;
        width: 100%;

    }

    .product-option-button:hover::before {
        left: auto;
        right: 0;
        width: 100%;
    }

    .product-option-button::before {
        content: "";
        position: absolute;
        left: 0;
        right: auto;
        top: 0;
        height: 100%;
        width: 0;
        background-color: #fff;
        opacity: 0.1;
        z-index: -1;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .selling-controll-slide {
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        column-gap: 10px;
    }

    .prev-selling-slide {
        padding: 5px;
        background: white;
        border: 1px solid black;
        border-radius: 4px;

    }

    .prev-selling-slide {
        padding: 5px;
        background: white;
        border: 1px solid black;
        border-radius: 4px;
        cursor: pointer;
    }

    .next-selling-slide {
        cursor: pointer;
        padding: 5px;
        background: white;
        border: 1px solid black;
        border-radius: 4px;
    }

    .slide-card {
        width: calc(100% /5);

        margin: 0;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 8px;
        overflow: hidden;

    }

    .card-selling-item-product {
        width: 100% !important;

        pointer-events: none !important;

    }

    .swiper {
        width: 100%;

    }
</style>
<section class="selling-container">
    <div class="selling-top-content">
        <h1 class="selling-titile">sản phẩm mới</h1>

    </div>
    <div class="selling-controll-slide">
        <div class="prev-selling-slide swiper-button-prev-card " id="button-selling-prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="next-selling-slide swiper-button-next-card" id="button-selling-next"><i class="fa-solid fa-chevron-right"></i></div>
    </div>
    <div class="selling-bottom-content">

        <div class="swiper cardSellingSlide">
            <div class="swiper-wrapper">
                <?php

                use controllers\ProductController;

                $pc = new ProductController();
                $products  =  $pc->getNewProduct();

                foreach ($products  as  $key => $value) : ?>
                    <div class="swiper-slide slide-card" onclick='dispatch("user/detailProduct","<?php echo $value["product_id"] ?>")'>

                        <div class="selling-item-product card-selling-item-product " id="selling-item-slide">
                            <div class="selling-product">
                                <img src='http://localhost/assets/Db_img/<?php echo  $value["MainImage"] ?>' alt="" />
                                <div class="content-product">
                                    <span class="product-star"><i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                    <h2 class="product-title">
                                        <?php echo $value["name"] ?>
                                    </h2>
                                    <h2 class="product-price">
                                        <span class="sell-price">
                                            <?php echo    number_format($value["price"] * 1000, 0, '', ','); ?> đ
                                        </span>
                                        <span class="current-price">

                                            <?php echo    number_format($value["promo_price"] * 1000, 0, '', ','); ?>đ
                                        </span>
                                    </h2>
                                    <span class="selling-precenta">new</span>
                                    <div class="product-option">
                                        <div class="product-option-top">
                                            <div class="like-product">
                                                <span> <i class="fa-regular fa-heart"></i></span>
                                            </div>
                                            <div class="detail-product" onclick='location.href="http://localhost/detail-product"'>
                                                >
                                                <span><i class="fa-regular fa-eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="product-option-bottom">
                                            <button class="product-option-button">
                                                <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>


            </div>

        </div>


    </div>

</section>