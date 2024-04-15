<style>
    /* footer  */
    .container-footer {
        width: 100%;
        height: 628px;
        background: #02000a;
    }

    .footer {
        max-width: 1440px;
        width: 100%;
        height: 628px;
        margin: 0 auto;
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;

        color: #ffffff;
    }

    .footer__top {
        width: 100%;
        height: 300px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer__title {
        padding-top: 32px;
        margin-left: 132.5px;
        width: 887px;
        text-decoration: center;
        font-size: 40px;
        line-height: 76px;
        font-weight: 600;
        background: linear-gradient(90deg, #ffffff, #5005a5);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .footer__button {
        width: 178px;
        height: 52px;
        background-color: #0e1327;
        color: #fff;
        text-align: center;
        border: none;
        border-radius: 4px;
        margin-top: 32px;
        margin-bottom: 32px;
        position: relative;
    }

    .footer__button span {
        position: absolute;
        right: 17px;
        top: 18px;
    }

    .footer__button:hover {
        border: 1px solid #fff8f8;
        background: linear-gradient(90deg, #00dbde, #fc00ff);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .footer__bottom {
        width: 100%;
        height: 328px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 125px;
    }

    @media only screen and (max-width: 960px) {
        .container-footer {
            height: auto;
        }

        .footer {
            height: auto;
        }

        .footer__top {
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .footer__title {
            width: 100%;
            height: max-content;
            font-size: clamp(1.25rem, 0.9821rem + 1.4286vw, 1.875rem);
            line-height: normal;
            padding-top: 20px;
            margin: 0;
        }

        .footer__bottom {
            flex-direction: column;
            height: auto;
        }
    }

    .footer__bottom-right {
        display: flex;
        gap: 30px;
    }

    .footer__bottom-left {
        width: 350px;
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
    }

    .footer__left-logo {
        width: auto;
        height: 60px;
        text-align: center;
    }

    .footer__left-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .footer__left-copyright {
        width: 100%;
        height: 48px;
        text-align: center;
    }

    .footer__left-copyright h4 {
        font-size: 20px;
        font-weight: 400;
        line-height: 24px;
    }

    .footer__left-icon {
        display: flex;
        gap: 16px;
    }

    .f-icon {
        cursor: pointer;
    }

    .footer__bottom-right {
        width: 635px;
        height: 200px;
    }

    .footer__right-company {
        width: 160px;
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .company__title {
        font-size: 20px;
        line-height: 28px;
        font-weight: 600;
    }

    .company__list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .company__item {
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        cursor: pointer;
    }

    .footer__right-support {
        width: 160px;
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .support__title {
        font-size: 20px;
        line-height: 28px;
        font-weight: 600;
    }

    .support__list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .support__item {
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        cursor: pointer;
    }

    .footer__right-stayUpToDate {
        width: 255px;
        height: 92px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .contact__title {
        font-size: 20px;
        line-height: 28px;
        font-weight: 600;
    }

    .input {
        width: 100%;
        height: 40px;
        position: relative;
    }

    .input__email {
        width: 100%;
        height: 100%;
        border-radius: 8px;
        padding-left: 11px;
    }

    .input__icon {
        display: block;
        position: absolute;
        left: 225px;
        top: 10px;
        color: #333;
    }

    @media only screen and (max-width: 600px) {
        .footer__bottom-right {
            padding-left: 20px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            height: auto;
            width: 100%;
        }
    }
</style>
<section id="footer" class="container-footer">
    <footer class="footer">
        <div class="footer__top">
            <h1 class="footer__title">
                FlowBite hệ thống nhà sách online 24/7
            </h1>
            <button class="footer__button">
                Tìm hiều thêm
                <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.2502 11.0001L13.72 8.53039C14.0129 8.23749 14.0129 7.7626 13.72 7.4697L11.2502 4.99997M13.5003 8.00004L2.50001 8.00004" stroke="white" stroke-width="1.1" stroke-linecap="round" />
                    </svg>
                </span>
            </button>
        </div>

        <div class="footer__bottom">
            <div class="footer__bottom-left">
                <div class="footer__left-logo">
                    <img src="http://localhost/assets/img/flowbite-logo (1).png" alt="" />
                </div>
                <div class="footer__left-copyright">
                    <h4>Copyright © 2024 BookStore</h4>
                    <h4>nhom web 2</h4>
                </div>
                <div class="footer__left-icon">
                    <div class="f-icon">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="f-icon">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                    <div class="f-icon">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="f-icon">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="footer__bottom-right">
                <div class="footer__right-company">
                    <h3 class="company__title">Giới thiệu</h3>
                    <ul class="company__list">
                        <li class="company__item">Về chúng tôi</li>
                        <li class="company__item">Blog</li>
                        <li class="company__item">Liên hệ</li>
                        <li class="company__item">Định giá</li>
                        <li class="company__item">Chứng thực</li>
                    </ul>
                </div>
                <div class="footer__right-support">
                    <h3 class="support__title">Hỗ trợ</h3>
                    <ul class="support__list">
                        <li class="support__item">trung tâm hỗ trợ</li>
                        <li class="support__item">Dịch vụ</li>
                        <li class="support__item">pháp lý</li>
                        <li class="support__item">Thông tin</li>
                        <li class="support__item">Trạng thái</li>
                    </ul>
                </div>
                <div class="footer__right-stayUpToDate">
                    <h3 class="contact__title">
                        thông báo lỗi hệ thống
                    </h3>
                    <div class="input">
                        <input type="email" class="input__email" placeholder="Your Email Address" />
                        <span class="input__icon"><i class="fa-regular fa-paper-plane"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>