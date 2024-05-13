<?php
require_once __DIR__ . "/../../components/banner.php";
?>
<style>
    main {
        margin-top: 10px;
    }

    .promotion-container {
        width: 100%;
        min-height: 100px;
        background-color: white;

    }

    .promotion-wrapper {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;

    }

    .promotion-wrapper ul {
        width: 100%;
        animation: runPromotion 10s linear infinite;
        display: flex;
    }

    .promotion-item {
        width: calc(100% /3);
        padding: 0 5px;
    }

    .promotion-item {
        width: 100%;
        object-fit: cover;
    }

    @keyframes runPromotion {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(-1200px);
        }

    }

    .Community-Updates {
        padding-top: 40px;
        width: 100%;
        height: 506px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .c-u__title-wrapper {
        width: 100%;
        height: 124px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    .c-u__title {
        font-size: 20px;
        font-weight: 500;
        line-height: 44px;
    }

    .c-u__des {
        text-align: center;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        width: 628px;
        margin: 8 auto 0 auto;
    }

    .c-u__card-wrapper {
        width: 100%;
        height: 366px;
        padding-top: 16px;
        display: flex;
        justify-content: space-between;
        gap: 24px;
    }

    .c-u__card {
        position: relative;
    }

    .c-u__card img {
        width: 368px;
        height: 286px;
        border-radius: 8px;
    }

    .c-cu__card-subdes {
        position: absolute;
        bottom: 0;
        left: 25px;
        width: 317px;
        height: 176px;
        background-color: #f5f7fa;
        border: none;
        border-radius: 8px;
        box-shadow: 0 8px 16px 0 #abbed166;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .c-cu__card-subdes:hover {
        border: 1px solid #333;
    }

    .c-u__card-subTitle {
        margin-left: 16px;
        text-align: center;
        width: 285px;
        font-size: 20;
        font-weight: 600;
        line-height: 28px;
    }

    .c-u__card-subButton {
        color: #4caf4f;
        display: flex;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
    }

    .c-u__card-subButton h3 {
        font-size: 20px;
        font-weight: 400;
        line-height: 26px;
    }

    .c-u__card-subButton :hover {
        background: linear-gradient(90deg, #00dbde, #fc00ff);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .blog {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        margin-top: 20px;
        display: flex;
        flex-direction: column;
    }

    .blog-title {
        font-size: 20px;
        font-weight: 500;
    }

    .payment {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media screen and (max-width:1020px) {
        .promotion-item {
            width: calc(100% /2);
            height: auto;
        }

        .c-u__des {
            width: 100%;
            text-wrap: wrap;
            word-wrap: break-word;

        }

        .payment {
            display: none;
        }

    }

    @media screen and (max-width:720px) {
        .c-u__card-wrapper {
            width: 100%;
            overflow: hidden;
            overflow-x: scroll;
        }

        .payment {
            max-width: none;
            width: 100%;
            overflow: hidden;

        }

        .payment img {

            padding: 0 5px;
            object-fit: cover;
            width: auto;
        }
    }
</style>
<main>
    <?php
    require_once __DIR__ . "/../../components/service_cart.php";
    require_once __DIR__ . "/../../components/sellingProduct.php";

    ?>
    <section class="promotion-container">
        <div class="promotion-wrapper">
            <ul>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(1).png" alt=""></div>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(2).png" alt=""></div>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(3).png" alt=""></div>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(1).png" alt=""></div>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(2).png" alt=""></div>
                <div class="promotion-item"><img src="http://localhost/assets/img/promoto-(3).png" alt=""></div>
            </ul>
        </div>
    </section>
    <!-- comuniti  -->

    <section class="blog">
        <h3 class="blog-title">Blog sách và cuộc sống</h3>
        <section class="Community-Updates">
            <div class="c-u__title-wrapper">
                <h3 class="c-u__title">Chăm sóc là cách tiếp thị mới</h3>
                <p class="c-u__des">
                    Blog FlowBite là nơi tốt nhất để đọc về thông tin chi tiết, xu hướng mới nhất của thành viên và hơn thế nữa. Xem ai đang tham gia cộng đồng, đọc về cách cộng đồng của chúng tôi đang tăng thu nhập thành viên và hơn thế nữa.​
                </p>
            </div>
            <div class="c-u__card-wrapper">
                <div class="c-u__card">
                    <img src="http://localhost/assets/img/image-18-(1).png" alt="" />
                    <div class="c-cu__card-subdes">
                        <h3 class="c-u__card-subTitle">
                            Tạo các quy trình bảo vệ hợp lý với OneRen
                        </h3>
                        <div class="c-u__card-subButton">
                            <h3>đọc thêm</h3>
                            <span><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5 16.399L19.7929 13.1062C20.1834 12.7156 20.1834 12.0825 19.7929 11.6919L16.5 8.39905M19.5 12.399L5.5 12.399" stroke="#4CAF4F" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="c-u__card">
                    <img src="http://localhost/assets/img/image-18-(2).png" alt="" />
                    <div class="c-cu__card-subdes">
                        <h3 class="c-u__card-subTitle">
                            Trách nhiệm bảo vệ của bạn là gì và làm thế nào bạn có thể
                            quản lý chúng?
                        </h3>
                        <div class="c-u__card-subButton">
                            <h3>đọc thêm</h3>
                            <span>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5 16.399L19.7929 13.1062C20.1834 12.7156 20.1834 12.0825 19.7929 11.6919L16.5 8.39905M19.5 12.399L5.5 12.399" stroke="#4CAF4F" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="c-u__card">
                    <img src="http://localhost/assets/img/image-18-(3).png" alt="" />
                    <div class="c-cu__card-subdes">
                        <h3 class="c-u__card-subTitle">
                            Đổi mới mô hình thành viên với Triathlon Australia
                        </h3>
                        <div class="c-u__card-subButton">
                            <h3>đọc thêm</h3>
                            <span>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.5 16.399L19.7929 13.1062C20.1834 12.7156 20.1834 12.0825 19.7929 11.6919L16.5 8.39905M19.5 12.399L5.5 12.399" stroke="#4CAF4F" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- payment  -->
    <section class="payment">
        <h1>Phương thức thanh toán</h1>
        <img src="http://localhost/assets/img/payment.png" alt="" />
    </section>
    <!-- support  -->
    <div id="root"></div>

</main>