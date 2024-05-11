<main id="mnp-add-product">
    <div class="bt-form-contact-simple">

        <div class="contact-item">
            <h2 class="contact-title">Thông tin sản phẩm</h2>
            <form class="form" autocomplete="off" id="form-add-new-product">
                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">Tên sản phẩm</label>
                        <input type="text" name="name" id="name" placeholder="Tên sản phẩm" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">giá</label>
                        <input type="text" name="price" id="price" placeholder="giá" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                </div>


                <div class="form-group-wrap">

                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">tác giả</label>
                        <input type="text" name="author" id="author" placeholder="tác giả" class="form-input" />
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">thể loại</label>
                        <input type="text" name="category" id="category" placeholder="thể loại" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">số lượng</label>
                        <input type="text" name="quantity" id="quantity" placeholder="số lượng" class="form-input" />
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">số sao</label>
                        <input type="text" name="rating" id="rating" placeholder="" class="form-input" disabled />
                    </div>
                </div>

                <div class="form-group-wrap">
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">giá bán</label>
                        <input type="text" name="promo_price" id="promo_price" placeholder="giá bán" class="form-input" />
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group form-pc">
                        <label class="form-lable-product" for="">gía nhập</label>
                        <input type="text" name="import_price" id="import_price" placeholder="giá   nhập" class="form-input" />
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
                <button class="button-action-mn-product change" id="button-change-image">thay đổi hình ảnh</button>
            </div>
            <div class="mnp-button-save-product-wrapper">
                <button class="button-action-mn-product  save " type="submit" id="button-form-edit-product-submit"><i class="fa-solid fa-floppy-disk"></i>lưu</button>
            </div>

        </div>
    </div>

</main>