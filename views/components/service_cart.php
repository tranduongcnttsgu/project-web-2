<style>
    .content-service-wrap {
        max-width: 1200px;
        width: 100%;
        height: auto;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 0px;
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .content-service-wrap .content-service {
        min-width: 250px;
        max-width: 300px;
        height: 110px;
        display: flex;
        column-gap: 10px;
    }

    .content-service-wrap .content-service:hover {
        box-shadow: 0 0 5px 0 rgb(75, 75, 75);
    }

    .content-service-wrap .content-service img {
        min-width: 38px;
        max-width: 50px;
        min-height: 38px;
        max-width: 50px;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .content-service-wrap .content-service .title {
        display: flex;
        flex-direction: column;
        text-align: start;
        justify-content: center;
    }

    .content-service-wrap .content-service .title h2 {
        font-size: 14px;
        font-weight: 700;
    }

    .content-service-wrap .content-service .title span {
        font-size: 12px;
    }

    @media only screen and (max-width: 1024px) {
        .content-service-wrap {
            flex-direction: column;
        }

        .content-service-wrap .content-service {
            max-width: none;
            width: 100%;
        }
    }

    @media only screen and (max-width: 720px) {


        .content-service-wrap .content-service {
            max-width: none;
            width: 100%;
            height: auto;
        }
    }
</style>
<section class="content-service-wrap">
    <div class="content-service">
        <img src="./assets/img/service-1.png" alt="" />
        <div class="title">
            <h2>miễn phí vận chuyển</h2>
            <span>đơn hàng trên 5 triệu đồng</span>
        </div>
    </div>
    <div class="content-service">
        <img src="./assets/img/service-2.png" alt="" />
        <div class="title">
            <h2>hoàng trả miễn phí</h2>
            <span>áp dụng cho đơn hàng trền 5 triệu đồng</span>
        </div>
    </div>
    <div class="content-service">
        <img src="./assets/img/service-3.png" alt="" />
        <div class="title">
            <h2>Thanh toán an toàn</h2>
            <span>thanh toán trực tuyến 100%</span>
        </div>
    </div>
    <div class="content-service">
        <img src="./assets/img/service-4.png" alt="" />
        <div class="title">
            <h2>chất lượng tốt nhất</h2>
            <span>đảm bảo sản phẩm chính hảng</span>
        </div>
    </div>
</section>