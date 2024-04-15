 <style>
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

     .outstanding-button-wrapper {
         margin-top: 10px;
         margin-bottom: 20px;
         max-width: 100%;
         width: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .outstanding-button {
         cursor: pointer;
         width: 300px;
         height: 50px;
         display: flex;
         justify-content: center;
         align-items: center;
         text-align: center;
         background-color: white;
         border: 1px solid blue;
         border-radius: 10px;
         transition: all .4s ease;
         column-gap: 10px;
     }

     .outstanding-button:hover {
         background-color: black;
         color: white;
     }
 </style>
 <section class="outstanding-container">
     <main class="outstanding-wrapper">
         <div class="outstading-navigaton">
             <ul>
                 <li class="active">bán chạy</li>
                 <li>được mua nhiều nhất</li>
                 <li>đánh giá cao nhất</li>
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
         <div class="outstanding-button-wrapper">
             <div class="outstanding-button">xem thêm <i class="fa-solid fa-arrow-right"></i></div>
         </div>
     </main>
 </section>