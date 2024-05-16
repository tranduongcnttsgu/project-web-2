<main>
    <h3 style="padding: 10px;">quản lý sản phẩm</h3>
    <div class="container-top">
        <div class="manager-order-nav">
            <form action="" class="phone-from-search" id="mnp-form-search-product">
                <select class="phone-product-category-select" name="category" id="categori-select">
                    <option value="false" selected>
                        tất cả danh mục
                    </option>
                    <?php

                    use controllers\ProductController;

                    $pc =  new ProductController();
                    $category = $pc->getCategory();

                    foreach ($category as $key => $value) :

                    ?>
                        <option value="<?php echo $value->getCategory_id() ?>">
                            <?php echo  $value->getName() ?>
                        </option>
                    <?php
                    endforeach;
                    ?>
                </select>

                <input type="text" name="searchKey" class="phone-input-box" id="mnp-input-search-product" placeholder="search" />
                <!-- <button type="submit" class="phone-button-form-search">
                    search
                </button> -->
            </form>
            <div class="button-action-wrapper">
                <a href="http://localhost/admin/product/addNew" id="button-manager-product-add-new">

                    <div class="product-button-action"><i class="fa-regular fa-square-plus"></i><span style="padding-left: 5px;">Thêm sản phẩm</span></div>
                </a>
            </div>
        </div>
        <div class="fui-table-ui-basic-linh table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>giá</th>
                        <th>số lượng còn lại</th>
                        <th>thao tác</th>

                    </tr>
                </thead>
                <tbody id="container-show-product">
                    <?php



                    $pc  = new  ProductController();
                    $listProduct = $pc->adminGetListProduct("0,5");

                    $count = 0;
                    foreach ($listProduct as $key => $product) {
                    ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td class="">
                                <img src="http://localhost/assets/Db_img/<?php echo $product["MainImage"] ?>" alt="" width="50px" height="50px" style="object-fit: cover;">
                            </td>
                            <td class="text-product">
                                <?php echo $product["name"] ?> </td>
                            <td class="">
                                <?php echo  number_format($product["price"] * 1000, 0, '', ','); ?>
                            </td>
                            <td class=""><?php echo $product["quantity"] ?></td>
                            <td>
                                <button class="button-action-mnProduct" id="button-action-mnProduct" data-product="<?php echo $product["product_id"] ?>">thao tác<i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="manager-product-containter-bottom" id="pagination-bottom-wrapper">
        <h6 class="title-pagination" id="title-pagination">
            <span id="mnp-curent-page"> trang 1 ( 5/</span><span id="total-product">20 sản phẩm </span> )
        </h6>
        <div class="fui-roundedFull-pagination">

            <ul class="pagination-list">
                <li class="pagination-item btn-prev" id="btn-pagination-mnp-prev">
                    <span class="pagination-link">
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.20711 0.792893C5.59763 1.18342 5.59763 1.81658 5.20711 2.20711L2.41421 5L5.20711 7.79289C5.59763 8.18342 5.59763 8.81658 5.20711 9.20711C4.81658 9.59763 4.18342 9.59763 3.79289 9.20711L0.292893 5.70711C-0.0976311 5.31658 -0.0976311 4.68342 0.292893 4.29289L3.79289 0.792893C4.18342 0.402369 4.81658 0.402369 5.20711 0.792893Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </li>

                <li class="pagination-item btn-next" id="btn-pagination-mnp-next">
                    <span class="pagination-link">
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.792893 0.792893C0.402369 1.18342 0.402369 1.81658 0.792893 2.20711L3.58579 5L0.792893 7.79289C0.402369 8.18342 0.402369 8.81658 0.792893 9.20711C1.18342 9.59763 1.81658 9.59763 2.20711 9.20711L5.70711 5.70711C6.09763 5.31658 6.09763 4.68342 5.70711 4.29289L2.20711 0.792893C1.81658 0.402369 1.18342 0.402369 0.792893 0.792893Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</main>