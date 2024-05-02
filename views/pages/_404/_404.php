<style>
    /*======================
    404 page
=======================*/


    .page_404 {
        width: 1200px;
        margin: 0 auto;
        background: #fff;

    }

    .page_404 img {
        width: 100%;
    }

    .four_zero_four_bg {

        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
    }




    .four_zero_four_bg h3 {

        text-align: center;

    }

    .link_404 {
        color: #fff !important;
        padding: 10px 20px;


        margin: 20px 0;
        display: inline-block;
    }

    .error-title {
        text-align: center;
        font-weight: 600;
        font-size: 30px;
        color: red;
    }

    .title {
        width: 100%;
        font-size: 30px;
        font-weight: 500;
        text-align: center;
    }

    .btn-12,
    .btn-12 *,
    .btn-12 :after,
    .btn-12 :before,
    .btn-12:after,
    .btn-12:before {
        border: 0 solid;
        box-sizing: border-box;
    }

    .btn-12 {
        -webkit-tap-highlight-color: transparent;

        background-color: #000;
        background-image: none;
        color: #fff;
        cursor: pointer;

        font-size: 100%;
        font-weight: 900;
        line-height: 1.5;
        margin: 0 auto;

        padding: 0;
        text-transform: uppercase;
    }

    .btn-12:disabled {
        cursor: default;
    }

    .btn-12:-moz-focusring {
        outline: auto;
    }

    .btn-12 svg {
        display: block;

    }

    .btn-12 [hidden] {
        display: none;
    }

    .btn-12 {
        border-radius: 99rem;
        border-width: 2px;
        overflow: hidden;
        padding: 0.8rem 3rem;
        position: relative;
    }

    .btn-12 span {
        mix-blend-mode: difference;
    }

    .btn-12:after,
    .btn-12:before {
        background: linear-gradient(90deg,
                #fff 25%,
                transparent 0,
                transparent 50%,
                #fff 0,
                #fff 75%,
                transparent 0);
        content: "";
        inset: 0;
        position: absolute;
        transform: translateY(var(--progress, 100%));
        transition: transform 0.2s ease;
    }

    .btn-12:after {
        --progress: -100%;
        background: linear-gradient(90deg,
                transparent 0,
                transparent 25%,
                #fff 0,
                #fff 50%,
                transparent 0,
                transparent 75%,
                #fff 0);
        z-index: -1;
    }

    .btn-12:hover:after,
    .btn-12:hover:before {
        --progress: 0;
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 5px;
    }
</style>
<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center error-title ">404</h1>


                    </div>

                    <div class="contant_box_404">
                        <h3 class="title">
                            lỗi truy cập
                        </h3>

                        <p style="text-align: center;">trang bạn đang tìm kiếm không có sẵn!!</p>


                        <div class="button-wrapper">
                            <a href="http://localhost">
                                <button class="btn-12"><span>Trang chủ</span></button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>