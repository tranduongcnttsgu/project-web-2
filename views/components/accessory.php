<style>
    /* copy css selling component  */
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

    /* css of selling end  */
    .outstanding-container {
        margin-top: 40px;
        width: 100%;
        height: auto;
        min-height: 500px;
        background-color: white;

    }

    .outstanding-wrapper {
        width: 1200px;
        margin: 0 auto;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .outstading-navigaton {
        width: 100%;
        height: 50px;
    }

    .outstading-navigaton ul {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        column-gap: 20px;
        border-bottom: 1px solid #90908e;
    }

    .outstading-navigaton li {
        font-size: 16px;
        font-weight: 500;
        color: #90908e;
        position: relative;
        cursor: pointer;

    }

    .outstading-navigaton li::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        height: 3px;
        width: 100%;
        background-color: black;
        width: 0;
        transition: width .3s ease;
    }

    .outstading-navigaton li.active {
        color: black;

    }

    .outstading-navigaton li.active::after {
        width: 100%;
    }

    .outstanding-product {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }

    .standing-list-product {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        row-gap: 20px;
    }

    .outstanding-item-product {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
<section class="outstanding-container">
    <main class="outstanding-wrapper">
        <div class="outstading-navigaton">
            <ul>
                <li class="active">phụ kiện khác</li>

            </ul>
        </div>
        <div class="outstanding-content">
            <ul class="standing-list-product">
                <?php
                for ($i = 0; $i < 10; $i++) :
                ?>
                    <li class="selling-item-product outstanding-item-product ">
                        <div class="selling-product outstanding-product ">
                            <img src="http://localhost/assets/img/blank-image.png" alt="">
                            <div class="content-product">
                                <span class="product-star"><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h2 class="product-title">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h2>
                                <h2 class="product-price">
                                    <span class="sell-price">200.000 đ</span>
                                    <span class="current-price">100.000đ</span>
                                </h2>

                                <div class="product-option">
                                    <div class="product-option-top">
                                        <div class="like-product">
                                            <span> <i class="fa-regular fa-heart"></i></span>
                                        </div>
                                        <div class="detail-product">
                                            <span><i class="fa-regular fa-eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="product-option-bottom ">
                                        <button class="product-option-button">
                                            <i class="fa-solid fa-cart-shopping"></i> thêm vào giỏ hảng</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                endfor;
                ?>
            </ul>
        </div>
    </main>
</section>