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
        <h1 class="selling-titile">sản phẩm đang giảm giá</h1>
        <div class="selling-clock">
            <h5 class="selling-clock-title">giờ giảm giá</h5>
            <div class="day-selling" id="ele-sale-day-Home">1</div>
            <div class="hour-selling" id="ele-sale-hour-Home">20</div>
            <div class="minutes-selling" id="ele-sale-minutes-Home">10</div>
            <div class="second-selling" id="ele-sale-second-Home">10</div>
        </div>
    </div>
    <div class="selling-controll-slide">
        <div class="prev-selling-slide swiper-button-prev-card " id="button-selling-prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="next-selling-slide swiper-button-next-card" id="button-selling-next"><i class="fa-solid fa-chevron-right"></i></div>
    </div>
    <div class="selling-bottom-content">

        <div class="swiper cardSellingSlide">
            <div class="swiper-wrapper">
                <?php for ($i = 0; $i < 10; $i++) : ?>
                    <div class="swiper-slide slide-card">

                        <div class="selling-item-product card-selling-item-product " id="selling-item-slide">
                            <div class="selling-product">
                                <img src="http://localhost/assets/img/blank-image.png" alt="" />
                                <div class="content-product">
                                    <span class="product-star"><i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                    <h2 class="product-title">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.
                                    </h2>
                                    <h2 class="product-price">
                                        <span class="sell-price">200.000 đ</span>
                                        <span class="current-price">100.000đ</span>
                                    </h2>
                                    <span class="selling-precenta">10%</span>
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
                                                <i class="fa-solid fa-cart-shopping"></i> thêm vào giỏ
                                                hảng
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endfor; ?>


            </div>

        </div>


    </div>

</section>
<script>
    function countDow(
        idEDays,
        IdEHour,
        IdEMinutes,
        IdESecond,
        timeEnd = "2024-12-1"
    ) {
        const eDay = document.getElementById(idEDays);
        const eHour = document.getElementById(IdEHour);
        const eMinutes = document.getElementById(IdEMinutes);
        const eSecond = document.getElementById(IdESecond);
        if (!eDay) {
            return;
        }

        let countDownDay = new Date(timeEnd).getTime();
        console.log(countDownDay);
        let start = setInterval(() => {
            let now = new Date().getTime();
            let distance = countDownDay - now;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);
            eDay.innerText = days;
            eHour.innerText = hours;
            eMinutes.innerText = minutes;
            eSecond.innerText = seconds;

            if (distance < 0) {
                clearInterval(start);
                eDay.innerText = 0;
                eHour.innerText = 0;
                eMinutes.innerText = 0;
                eSecond.innerText = 0;
            }
        }, 1000);
    }
    countDow(
        "ele-sale-day-Home",
        "ele-sale-hour-Home",
        "ele-sale-minutes-Home",
        "ele-sale-second-Home",
        "2024-5-25"
    );
    // selling slider 
</script>