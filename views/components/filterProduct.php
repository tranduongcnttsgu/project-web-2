<sectionbn class="filter-container">
    <div class="filter-category">
        <h2 class="filter-category-title">Hiển thị theo nhóm sản phẩm</h2>
        <ul class="filter-category-list">
            <li class="filter-category-item active" category="false" onclick="dispatch('user/searchCategory',this)">Tất cả danh mục</li>
            <?php

            use controllers\ProductController;

            $productController = new ProductController();
            foreach ($productController->getCategory() as $category) :



            ?>
                <li class="filter-category-item" category="<?= $category->getCategory_id() ?>" onclick="dispatch('user/searchCategory',this)"><?= $category->getName() ?></li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>
    <div class="filter-pice-controller">
        <h2 class="filter-price-controler-title">
            Sắp xếp sản phẩm theo
        </h2>
        <div class="filterprice-option-1" id="filter-price-ascending" onclick="dispatch('user/sortProduct','increase')">
            <i class="fa-solid fa-arrow-up-wide-short"></i> <span class="filter-price-ct-o-title-1">
                Giá tiền tăng đần
            </span>
        </div>
        <div class="filterprice-option-1" id="filter-price-decrease" onclick="dispatch('user/sortProduct','decrease')">
            <i class="fa-solid fa-arrow-down-wide-short"></i> <span class="filter-price-ct-o-title-1">
                Giá tiền giảm dần
            </span>
        </div>
        <!-- <div class="filterprice-option-1">
            <i class="fa-brands fa-sellsy"></i><span class="filter-price-ct-o-title-1">
                sản phẩm giảm giá
            </span>
        </div> -->
    </div>
    <div class="filter-author">
        <h2 class="filter-author-title">Hiển thị theo tác giả</h2>
        <ul class="filter-author-list">
            <li class="filter-author-item active" author="false" onclick=" dispatch('user/searchAuthor',this)">Tất cả danh mục</li>
            <?php



            $productController = new ProductController();
            foreach ($productController->getAuthor() as $author) :



            ?>
                <li class="filter-author-item" author="<?= $author->getAuthorId() ?>" onclick=" dispatch('user/searchAuthor',this)"><?= $author->getName() ?></li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>
    <div class="filter-price">
        <h2 class="filter-price-title">
            Lọc theo giá tiền
        </h2>
        <ul class="filter-list-price" id="list-option-filter-price">
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-0" name="price" value="0-10000" checked>
                <label for="price-option-0">Tất cả mức giá</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-1" name="price" value="0-50">
                <label for="price-option-1"> 0đ - 50.000đ</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-2" name="price" value="50-100">
                <label for="price-option-2"> 50.000đ - 100.000đ</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-3" name="price" value="100-150">
                <label for="price-option-3"> 100.000đ - 150.000đ</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-4" name="price" value="150-200">
                <label for="price-option-4"> 150.000đ - 200.000đ</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-5" name="price" value="200-500">
                <label for="price-option-5"> 200.000đ - 500.000đ</label>
            </li>
            <li class="filter-item-price">
                <input onclick="dispatch('user/sortProductPrice',this)" type="radio" id="price-option-6" name="price" value="500-10000">
                <label for="price-option-6">500.000đ trở lên</label>
            </li>
        </ul>
    </div>

</sectionbn>