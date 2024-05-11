<div class="container-header">
    <header class="header">
        <div class="header-top-background">
            <div class="header-top">
                <div class="wrapper-header">
                    <ul class="header-info-left">
                        <li class="list-dot">
                            <span class="dot" style="background-color: red"></span>
                            <span class="dot" style="
                                            background-color: rgb(253, 212, 8);
                                        "></span>
                            <span class="dot" style="
                                            background-color: rgb(21, 234, 18);
                                        "></span>
                        </li>
                        <li>FlowBite@gmail.com</li>
                    </ul>
                </div>
                <div class="wrapper-header">
                    <div class="header-top-info-middle">
                        <ul class="list-flash" id="list-news-flash">
                            <li class="item-flash">
                                Sách cho dân it
                                <span>&#10146;</span>
                                <a href="#">
                                    <span class="text-animation">click here</span>
                                </a>
                            </li>
                            <li class="item-flash">
                                Sách tiếng anh
                                <span>&#10146;</span>
                                <a href="#">
                                    <span class="text-animation">click here</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="header-top-lists-options">
                    <li class="header-top-lists-item" id="item-account">
                        <span class="header-top-item-link">
                            <img src="http://localhost/assets/img/User-Outline.png" alt="user-icon" class="header-top-option-icon" />
                            <h4 class="header-top-option-title">
                                tài khoản
                            </h4>
                        </span>
                    </li>
                    <li class="header-top-lists-item">
                        <a href="#" class="header-top-item-link">
                            <img src="http://localhost/assets/img/Like-Outline.png" alt="user-icon" class="header-top-option-icon" />
                            <h4 class="header-top-option-title">
                                sản phẩm đã thích
                            </h4>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-middle">
            <div class="header-middle-logo">
                <a href="http://localhost" class="header-middle-logo-link">
                    <img src="http://localhost/assets/img/logo.png" alt="logo" />
                </a>
            </div>
            <form action="" class="header-middle-form-search" id="header-submit-search-product">
                <input type="text" placeholder="Tên sản phẩm" class="form-search-box" name="searchKey" id="header-searchProduct-input" />

                <button class="form-button-search">search</button>
            </form>
            <div class="header-middle-nav">
                <div class="header-middle-action-wrapper">
                    <div class="header-button-change-page">

                        <a href="<?php echo $buttonLink; ?>" style="display: inline-block; width:100%; height:100%; padding-top:10px;">
                            <i class="fa-solid fa-shop"></i>
                            <span><?php echo $titleButton; ?></span>
                        </a>
                    </div>
                    <div class="header-bag-wrapper">
                        <div class="bag-product-icon">
                            <a href="http://localhost/checkout/cart">
                                <img src="http://localhost/assets/img/Cart-Outline.png" alt="cart" style="
                                                width: 30px;
                                                height: 30px;
                                                object-fit: cover;
                                            " />
                            </a>
                        </div>
                        <div class="bag-product-infor" id="icon-cart-header">
                            <div>
                                sản phẩm:<span id="totail-product" style="color: red; font-weight: 600" ;>0</span>
                            </div>
                            <div>số tiền:0đ</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- phone header  -->
            <div class="phone-header">
                <div class="phone-open-menu" id="ele-phone-click-open-menu">
                    <img src="http://localhost/assets/img/Burger-Nav-Outline.png" alt="iconOpen" style="
                                    width: 20px;
                                    height: 20px;
                                    object-fit: cover;
                                " />
                </div>
                <div class="wrapper-phone-header-menu active" id="ele-wrapper-phone-header-menu">
                    <div class="phone-header-menu" id="ele-phone-header-menu">
                        <div class="phone-button-close-menu" style="display: inline-block">
                            <button id="ele-phone-button-close-menu" style="
                                            width: auto;
                                            height: 25px;
                                            padding: 5px;
                                            padding-left: 10px;
                                            padding-right: 10px;
                                            border-radius: 8px;
                                            background-color: red;
                                            color: white;
                                            font-size: 10px;
                                            cursor: pointer;
                                        ">
                                &#10005;
                            </button>
                        </div>
                        <div class="header-button-change-page">
                            <a href="#">
                                <i class="fa-solid fa-shop"></i>
                                <span>go shop</span>
                            </a>
                        </div>
                        <div class="header-bag-wrapper">
                            <div class="bag-product-icon">
                                <a href="#">
                                    <img src="http://localhost/assets/img/Cart-Outline.png" alt="cart" style="
                                                    width: 30px;
                                                    height: 30px;
                                                    object-fit: cover;
                                                " />
                                </a>
                            </div>
                            <div class="bag-product-infor">
                                <div>
                                    sản phẩm:<span id="totail-product" style="
                                                    color: red;
                                                    font-weight: 600;
                                                " ;>0</span>
                                </div>

                            </div>
                        </div>
                        <nav>
                            <ul class="header-bottom-content phone">
                                <li class="header-bottom-item phone">
                                    <a href="http://localhost"> trang chủ</a>
                                </li>
                                <li class="header-bottom-item phone">
                                    <a href="http://localhost/products">sản phẩm</a>
                                </li>
                                <li class="header-bottom-item phone">
                                    <a href="#">liên hệ</a>
                                </li>
                                <li class="header-bottom-item phone">
                                    <a href="#">thể loại</a>
                                </li>
                                <li class="header-bottom-item phone">
                                    <a href="#">giảm giá</a>
                                </li>
                                <li class="header-bottom-item phone">
                                    <a href="#"> blog</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <ul class="header-bottom-content">
                <li class="header-bottom-item ">
                    <a href="http://localhost"> trang chủ</a>
                </li>
                <li class="header-bottom-item ">
                    <a href="http://localhost/product">sản phẩm</a>
                </li>
                <li class="header-bottom-item ">
                    <a href="#">liên hệ</a>
                </li>
                <li class="header-bottom-item ">
                    <a href="#">thể loại</a>
                </li>
                <li class="header-bottom-item ">
                    <a href="#">giảm giá</a>
                </li>
                <li class="header-bottom-item ">
                    <a href="#"> blog</a>
                </li>
            </ul>
        </div>
        <!-- phone header  search  form-->
        <div class="phone-header-middle-form-wrapper">
            <form action="" class="phone-from-search">
                <select class="phone-product-category-select" name="categories[]" id="categori-select">
                    <option value="Tất cả danh mục" selected>
                        Tất cả danh mục
                    </option>
                    <option value="Sách ngoại ngữ">
                        Sách ngoại ngữ
                    </option>

                    <option value="Sách IT">Sách IT</option>
                    <option value="Sách chuyên ngành">
                        Sách chuyên ngành
                    </option>
                    <option value="Sách luyện thi">
                        Sách luyện thi
                    </option>
                    <option value="Sách Luyện Thi IELTS">
                        Sách Luyện Thi IELTS
                    </option>
                    <option value="Sách Luyện Thi TOEIC">
                        Sách Luyện Thi TOEIC
                    </option>

                    <option value="Sách Tiếng Hàn">
                        Sách Tiếng Hàn
                    </option>
                    <option value="Sách Tiếng Trung">
                        Sách Tiếng Trung
                    </option>
                    <option value="Sách Tiếng Nhật">
                        Sách Tiếng Nhật
                    </option>
                    <option value="Ngữ pháp Tiếng Nhật">
                        Ngữ pháp Tiếng Nhật
                    </option>
                </select>

                <input type="text" name="searchKey" class="phone-input-box" placeholder="search" />
                <button type="submit" class="phone-button-form-search">
                    search
                </button>
            </form>
        </div>
    </header>

</div>