<main id="show-product-detail-page">
    <div class="bt-form-contact-simple">

        <div class="contact-item">
            <h2 class="contact-title">Thông tin sản phẩm</h2>
            <form class="form" autocomplete="off" id="form-edit-product">
                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Tên sản phẩm</label>
                        <input type="text" name="name" id="name" placeholder="Tên sản phẩm" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Giá</label>
                        <input type="text" name="price" id="price" placeholder="Nhập giá" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                </div>


                <div class="form-group-wrap">

                    <div class="form-group form-pc">
                        <div class="lable-wrapper">
                            <label class="form-lable-product" for="">Tác giả</label>
                            <select name="" id="select-author">
                                <?php

                                use controllers\ProductController;

                                $pc = new ProductController();
                                $authors = $pc->getAuthor();
                                foreach ($authors as $key => $value) :
                                ?>
                                    <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName(); ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <input type="text" name="author" id="author" placeholder="Tác giả" class="form-input" />
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group form-pc">
                        <div class="lable-wrapper">
                            <label class="form-lable-product" for="">Thể loại</label>
                            <select name="" id="select-category">
                                <?php


                                $pc = new ProductController();
                                $authors = $pc->getCategory();
                                foreach ($authors as $key => $value) :
                                ?>
                                    <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName(); ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <input type="text" name="category" id="category" placeholder="Thể loại" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Số lượng</label>
                        <input type="text" name="quantity" id="quantity" placeholder="Nhập số lượng" class="form-input" />
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Số sao</label>
                        <input type="text" name="rating" id="rating" placeholder="" class="form-input" disabled />
                    </div>
                </div>

                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Giá bán</label>
                        <input type="text" name="promo_price" id="promo_price" placeholder="Giá bán" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Giá nhập</label>
                        <input type="text" name="import_price" id="import_price" placeholder="Giá nhập" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                </div>



            </form>
        </div>
    </div>
    <div class="manager-product-contaienr-bottom">
        <div class="mn-product-contaier-left">

            <img src="http://localhost/assets/Db_img/default-img-product.png" alt="" class="mn-product-img-privew" id="img-product" data-img="default-img-product.png">
            <span class="btn-delete-img-product" id="btn-delete-img-product"><i class="fa-regular fa-trash-can"></i></span>
        </div>
        <div class="mn-product-contaienr-right">
            <div class="mn-input-img-product">

                <input type="file" class="input-mnp-img" id="input-selector-img">
                <button class="button-action-mn-product change" id="button-change-image">Đổi hình ảnh</button>
            </div>
            <div class="mnp-button-save-product-wrapper">
                <button class="button-action-mn-product  save " type="submit" id="button-form-edit-product-submit"><i class="fa-solid fa-floppy-disk"></i>Lưu</button>
            </div>
            <div class="mnp-button-save-product-wrapper">
                <button class="button-action-mn-product " id="button-manager-product-delete" onclick="dispatch('admin/manager-product/popup/delete-product',1)"><i class="fa-solid fa-trash-can"></i>Xóa sản phẩm</button>
            </div>
        </div>
    </div>

</main>