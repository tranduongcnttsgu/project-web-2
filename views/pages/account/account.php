 <style>
     :root {
         --primary-color: #0f172a;

         --primary-boxshadow: 0 0 5px rgba(0, 0, 0, 0.3);
         --primary-color-button: #db4444;
     }

     .container {
         max-width: 1200px;
         width: 100%;
         margin: 0 auto;
         display: flex;
         justify-content: center;
         align-items: center;
         margin-top: 20px;
     }

     #ele-form-message-email {
         font-size: 14px;
         color: red;
     }

     #ele-form-message-pass {
         font-size: 14px;
         color: red;
     }

     .container-formlogin {
         max-width: 400px;
         height: auto;
         width: 100%;
         padding: 10px;
         border-radius: 8px;
         background: #fff;
         animation: form 0.5s linear forwards;
         animation-iteration-count: 1;
         overflow: hidden;
         transition: all 0.5s ease;
         color: black;
     }



     @keyframes form {
         0% {
             top: 50px;
         }

         100% {
             top: 100px;
         }
     }

     .container-formlogin .title-fm {
         width: 100%;
         height: 50px;
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .container-formlogin .title-fm h3 {
         font-size: 20px;
         font-weight: 500;
         color: var(--primary-color);
         position: relative;
     }

     .container-formlogin .title-fm .btn-close {
         position: absolute;
         right: 5px;
         top: 2px;
         width: 20px;
         height: 20px;
         border-radius: 50%;
         background-color: var(--primary-color);
         color: white;
         display: flex;
         justify-content: center;
         align-items: center;
         cursor: pointer;
         z-index: 10;
     }

     .container-formlogin .form {
         width: 100%;
         height: 210px;
         display: flex;
         flex-direction: column;
         justify-content: space-around;
     }

     .container-formlogin .form .input-box {
         width: 100%;
         height: 60px;
         display: flex;
         flex-direction: column;
         margin-bottom: 10px;
     }

     .container-formlogin .form .input-box label {
         font-size: 18px;
         font-weight: 600;
     }

     .container-formlogin .form .input-box input {
         width: 100%;
         min-height: 36px;
         height: 36px;
         outline: none;
         border-radius: 8px;
         padding-left: 5px;
         margin-top: 5px;
         border: none;
         box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.2);
     }

     .container-formlogin .form .buttons {
         width: 100%;
         height: 40px;
         font-size: 20px;
         overflow: hidden;
         box-shadow: var(--primary-boxshadow);
         background-color: var(--primary-color);
         border-radius: 10px;
         margin-bottom: -8px;
         color: white;
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .container-formlogin .form .buttons:hover {
         box-shadow: unset;
     }

     .container-formlogin .form .buttons:disabled {
         background: #646262;
         color: #ffffff;
         pointer-events: none;
     }

     .container-formlogin .sub-title {
         width: 100%;
         height: 30px;
         padding-top: 5px;
     }

     .container-formlogin .sub-title h3 {
         font-size: 16px;
         font-weight: 400;
     }

     .container-formlogin .icon-list {
         display: flex;
         justify-content: space-between;
         align-items: center;
         width: 100%;
         height: 50px;
     }

     .container-formlogin .icon-list .icon-item {
         width: 124px;
         padding: 3px;
         height: 40px;
         font-size: 16px;
         text-align: center;
         display: flex;
         align-items: center;
         column-gap: 3px;
         border-radius: 5px;
         box-shadow: var(--primary-boxshadow);
         justify-content: center;
         cursor: pointer;
     }

     .container-formlogin .icon-list .icon-item:hover {
         box-shadow: unset;
     }

     .container-formlogin .icon-list .icon-item:nth-child(1) {
         background-color: #106bff;
         color: white;
     }

     .container-formlogin .icon-list .icon-item:nth-child(2) {
         background-color: var(--primary-color-button);
         color: white;
     }

     .container-formlogin .icon-list .icon-item:nth-child(3) {
         background-color: var(--primary-color);
         color: white;
     }

     .register-title {
         margin-top: 10px;
         font-size: 16px;
     }

     .register-link {
         font-size: 16px;
         color: #106bff;
     }
 </style>
 <main class="container">

     <section class="container-formlogin" id="ele-form-login">
         <div class="title-fm">
             <h3>Đăng nhập</h3>

         </div>
         <form action="" class="form" autocomplete="off" id="form-login" method="post">
             <div class="input-box ">
                 <label for="email">Tên người dùng</label>
                 <input type="email" placeholder="Vui lòng nhập email đăng nhập" id="email" name="username" />
                 <span id="ele-form-message-email" class="form-message"></span>
             </div>
             <div class="input-box">
                 <label for="password">Mật khẩu</label>
                 <input type="password" placeholder="Vui lòng nhập mật khẩu" id="password" name="password" />
                 <span id="ele-form-message-pass" class="form-message"></span>
             </div>
             <button class="buttons" type="submit" id="ele-form-btn-submit-login">
                 Đăng nhập
             </button>
         </form>
         <div class="sub-title">
             <h3>Các phương thức đăng nhập khác:</h3>
         </div>
         <div class="icon-list">
             <div class="icon-item">
                 <i class="fa-brands fa-facebook"></i>
                 <span>Facebook</span>
             </div>
             <div class="icon-item">
                 <i class="fa-brands fa-google"> <span>Google</span></i>
             </div>
             <div class="icon-item">
                 <i class="fa-brands fa-github"></i>
                 <span>Github</span>
             </div>
         </div>
         <div class="register-title">
             <span>Bạn chưa có tài khoản? <a href="http://localhost/account/register" class="register-link">Tạo tài khoản</a></span>
         </div>
     </section>

 </main>