<style>
    .container-main {
        margin-top: 20px;
    }

    @media only screen and (max-width: 1024px) {
        .container-main {
            margin-top: 20px;
        }
    }

    .container-f {
        max-width: 500px;
        width: 100%;
        height: auto;
        margin: 0 auto;
        border: 2px solid #f1f1f1f1;
        border-radius: 5px;
        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
    }

    .form-title {
        font-size: 16px;
        text-align: center;
        margin: 10px auto 0 auto;
    }

    .form {
        margin: 0 15px;
        font-weight: 400;
    }

    label {
        font-weight: 600;
        font-size: 18px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        margin: 5px 0 10px 0;
        padding: 15px;
        background-color: #f1f1f1f1;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .registerbtn {
        width: 100%;
        border: 2px solid transparent;
        padding: 12px 20px;
        color: whitesmoke;
        font-size: 20px;
        margin: 5px 0 10px 0;
        cursor: pointer;
        opacity: 0.9;
        border-radius: 10px;
        background: black;

    }

    .registerbtn:hover {
        background-color: #ffffff;
        color: #646262;
        border-color: #646262;
        transition: 0.3s;
    }

    .form-goup input:focus {
        border-color: #2691d9;
        transition: 0.3s;
    }

    .log-in {
        text-align: right;
    }

    .log-in a {
        text-decoration: underline;
    }

    .log-in a:link {
        color: blue;
    }

    .log-in a:hover {
        color: lightblue;
    }

    .selection {
        display: flex;
        margin: 10px auto;
    }

    .selection div {
        width: 33%;
        box-sizing: border-box;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        cursor: pointer;
    }

    .selection h4 {
        color: #ffffff;
        font-size: 14px;
    }

    .facebook {
        background-color: #106bff;
    }

    .google {
        background-color: #f52036;
        margin: 0 10px;
    }

    .github {
        background-color: #353332;
    }

    .input-box.invalid input {
        border-color: #f52036;
        transition: 0.3s;
    }

    .handle-error {
        color: #f52036;
    }

    @media screen and (max-width: 767px) {
        .selection h4 {
            display: none;
        }

        .selection img {
            margin-right: 0;
        }
    }
</style>
<main>
    <section class="container-main">
        <div class="container-f">
            <form action="#" class="form" id="form">
                <div class="form-title">
                    <h3>Đăng ký tài khoản</h3>
                </div>
                <div class="form-goup">
                    <div class="input-box">
                        <label for="name">Họ và tên</label>
                        <input id="name" type="text" name="name" placeholder="Nhập tên" value="" />
                        <span class="handle-error"></span>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" placeholder="Email" value="" />
                        <span class="handle-error"></span>
                    </div>
                    <div class="input-box">
                        <label for="password">Mật khẩu</label>
                        <input id="password" type="password" name="password" placeholder="Nhập mật khẩu" value="" />
                        <span class="handle-error"></span>
                    </div>
                    <div class="input-box">
                        <label for="password-confirm">Xác nhận mật khẩu</label>
                        <input id="password-confirm" type="password" name="password-confir" placeholder="Nhập lại mật khẩu" value="" />
                        <span class="handle-error"></span>
                    </div>
                </div>

                <input type="submit" class="registerbtn" value="Đăng ký" />
                <h4>Phương thức đăng ký khác</h4>
                <div class="selection">
                    <!-- logo 4 cái -->
                    <div class="facebook">
                        <i style="color: aliceblue; font-size: 14px; margin-right: 5px" class="fa-brands fa-facebook"></i>
                        <h4>Facebook</h4>
                    </div>
                    <div class="google">
                        <i style="color: aliceblue; font-size: 14px; margin-right: 5px" class="fa-brands fa-google"></i>
                        <h4>Google</h4>
                    </div>
                    <div class="github">
                        <i style="color: aliceblue; font-size: 14px; margin-right: 5px" class="fa-brands fa-github"></i>
                        <h4>Github</h4>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>