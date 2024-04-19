<section class="user-container">
    <div class="container-left">
        <div class="sidebar-avatar" id="rootUserAvatar">

        </div>
        <div class="sidebar close">

            <ul class="side-menu">
                <li titles="shop" class="active" key="0">
                    <span><i class="bx bx-store-alt"></i>Thông tin người dùng</span>
                </li>
                <li titles="static" key="1">
                    <span><i class="bx bx-analyse"></i>Đơn hàng</span>
                </li>
                <li titles="mes" key="2">
                    <span><i class="bx bx-group"></i>sản phẩm đã mua</span>
                </li>
                <li titles="user" key="3">
                    <span><i class="bx bx-group"></i>sản phẩm yêu thích</span>
                </li>

            </ul>
            <ul class="side-menu">
                <li onclick="dispatch('user/logout',1)" class="logout-btn">
                    <span class="logout">
                        <i class="bx bx-log-out-circle"></i>
                        đăng xuất
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-right">
        <main class="user-info-main" id="user-info-main">
            <div class="user-info-left" id="rootFormUserInfo">

            </div>
            <div class="user-info-right" id="rootInforContentLeft">

            </div>
        </main>



        <main class="user-order-main">
            <div class="order-main-wrapper">
                <h2 class="main-title">đơn hàng của tôi</h2>
                <ul class="list-order-detail" id="container-list-order">


                </ul>
            </div>
        </main>
        <main class="user-cart-main">
            cart
        </main>
        <main class="user-like-main">
            like
        </main>

    </div>
</section>
<script>
    const sideLinks = document.querySelectorAll(
        ".sidebar .side-menu li span:not(.logout)"
    );

    //   handle toggle when click navigaton
    let main = document.getElementsByClassName("container-right")[0].children;
    main = [...main]
    main.forEach(ele => {
        ele.classList.add("change")
    })
    main[0].classList.remove("change")
    sideLinks.forEach((item) => {
        const li = item.parentElement;
        let index = 0;
        item.addEventListener("click", () => {
            sideLinks.forEach((i) => {
                i.parentElement.classList.remove("active");


            });
            li.classList.add("active");
            index = +li.getAttribute("key")
            main.forEach(ele => {
                ele.classList.add("change")
            })
            main[index].classList.remove("change");

        });
    });
</script>

<script type="module" src="http://localhost/assets/js/userSlice/index.js"></script>