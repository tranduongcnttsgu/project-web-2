const name_permission = 'quản lý sản phẩm';
let permission = {};
const buttonAddNew = document.getElementById('button-manager-product-add-new');
const buttonEdit = document.getElementById('button-form-edit-product-submit');
const buttonDelete = document.getElementById('button-manager-product-delete');
const checkPermissions = async () => {
    const req = await fetch('http://localhost/admin/check-permission');
    const res = await req.json();
    if (!res.success) {
        return (window.location.href = 'http://localhost/undefind-href');
    }
    permission =
        res.data.find((role) => {
            return role.permission.service === name_permission;
        })?.service ?? false;
    if (!permission) {
        return (window.location.href = 'http://localhost/undefind-href');
    }
    if (permission.action_create === 0) {
        buttonAddNew?.classList.add('button-none');
    }
    if (permission.action_delete === 0) {
        buttonDelete?.classList.add('button-none');
    }
    if (permission.action_update === 0) {
        buttonEdit?.classList.add('button-none');
    }

    console.log(permission);
};
checkPermissions();
const optionSelectAuthor = document.getElementById('select-author');
optionSelectAuthor?.addEventListener('change', (e) => {
    document.getElementById('author').value = e.target.value;
});
const optionSelectCategory = document.getElementById('select-category');
optionSelectCategory?.addEventListener('change', (e) => {
    document.getElementById('category').value = e.target.value;
});
const showDetailProduct = document.getElementById('show-product-detail-page');
const getInfoOrder = () => {
    const name = document.getElementById('name');
    const price = document.getElementById('price');
    const author = document.getElementById('author');
    const category = document.getElementById('category');
    const quantity = document.getElementById('quantity');
    const rating = document.getElementById('rating');
    const promo_price = document.getElementById('promo_price');
    const import_price = document.getElementById('import_price');
    const img_product = document.getElementById('img-product');
    const productId = JSON.parse(localStorage.getItem('ad-manager-productId'));
    const formatPrice = (price) => {
        const multipliedPrice = (price * 1000).toString();

        const formattedPrice = multipliedPrice.replace(
            /\B(?=(\d{3})+(?!\d))/g,
            ','
        );

        return formattedPrice;
    };
    const payload = new URLSearchParams();
    payload.set('productId', productId);
    fetch('http://localhost/admin/manager-product/info-product', {
        method: 'post',
        body: payload,
    })
        .then((res) => res.json())
        .then((data) => {
            const product = data.data.product;
            const categoryP = data.data.category;
            const authorP = data.data.author;
            name.value = product.name;
            price.value = formatPrice(product.price);
            rating.value = product.rating;
            quantity.value = product.quantity;
            promo_price.value = formatPrice(product.promo_price);
            import_price.value = formatPrice(product.import_price);
            img_product.src =
                'http://localhost/assets/Db_img/' + product.MainImage;
            img_product.setAttribute('data-img', product.MainImage);
            author.value = authorP.name;
            document.getElementById('select-author').value = authorP.name;
            category.value = categoryP.name;
            document.getElementById('select-category').value = categoryP.name;
        });
};
if (showDetailProduct) {
    getInfoOrder();
    Validator({
        form: '#form-edit-product',
        formGroupSelector: '.form-group',
        errorSelector: '.error-message',
        rules: [
            Validator.isRequired('#name', 'Vui lòng nhập tên sản  phẩm'),
            Validator.minLength('#name', 2),
            Validator.isPrice('#price', 'sai định dạng ex:10,000'),
            Validator.isRequired('#price', 'Vui lòng nhập giá tiền'),
            Validator.minLength('#price', 1),

            Validator.isRequired('#author', 'Vui lòng nhập tên tác giả'),
            Validator.isRequired('#category', 'Vui lòng nhập tên thể  '),
            Validator.isRequired('#quantity', 'Vui lòng nhập số lượng'),
            Validator.minLength('#quantity', 1),
            Validator.isNumber('#quantity'),
            Validator.isPrice('#promo_price', 'sai định dạng ex:10,000'),
            Validator.isRequired('#promo_price', 'Vui lòng nhập giá tiền'),
            Validator.minLength('#promo_price', 1),
            Validator.isPrice('#import_price', 'sai định dạng ex:10,000'),
            Validator.isRequired('#import_price', 'Vui lòng nhập giá tiền'),

            Validator.minLength('#import_price', 1),
        ],
        onSubmit: function (data) {
            const inputPriviewImage = document.getElementById('img-product');
            data.MainImage = inputPriviewImage.getAttribute('data-img');
            const productId = JSON.parse(
                localStorage.getItem('ad-manager-productId')
            );
            const payload = JSON.stringify({ data, productId });
            fetch('http://localhost/admin/manager-product/update-product', {
                method: 'post',
                body: payload,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        MessageBox(
                            'cập nhật  sản phẩm   thành công',
                            'thông báo'
                        );
                    } else {
                        MessageBox(
                            'lỗi cập nhật sản phẩm',
                            'thông báo',
                            'error'
                        );
                    }
                });
        },
    });
    const buttonSubmit = document.getElementById(
        'button-form-edit-product-submit'
    );
    buttonSubmit.addEventListener('click', () => {
        const form = document.getElementById('form-edit-product');
        form.requestSubmit();
    });
    const buttonChangeImage = document.getElementById('button-change-image');
    const inputSelectorImage = document.getElementById('input-selector-img');
    const inputPriviewImage = document.getElementById('img-product');
    const buttondeleteImg = document.getElementById('btn-delete-img-product');
    buttondeleteImg.addEventListener('click', () => {
        inputPriviewImage.src =
            'http://localhost/assets/Db_img/default-img-product.png';
        inputPriviewImage.setAttribute('data-img', 'default-img-product.png');
    });
    buttonChangeImage.addEventListener('click', () => {
        inputSelectorImage.click();
    });
    inputSelectorImage.addEventListener('change', () => {
        const [file] = inputSelectorImage.files;
        if (file) {
            inputPriviewImage.src = URL.createObjectURL(file);

            inputPriviewImage.setAttribute('data-img', file.name);
        }
    });
}
//   add  new  product
const addNewProduct = document.getElementById('mnp-add-product');
if (addNewProduct) {
    Validator({
        form: '#form-add-new-product',
        formGroupSelector: '.form-group',
        errorSelector: '.error-message',
        rules: [
            Validator.isRequired('#name', 'Vui lòng nhập tên sản phẩm'),
            Validator.minLength('#name', 2),
            Validator.isRequired('#price', 'Vui lòng nhập giá tiền'),
            Validator.minLength('#price', 1),
            Validator.isPrice('#price', 'sai định dạng ex:10,000'),
            Validator.isRequired('#author', 'Vui lòng nhập tên tác giả'),
            Validator.isRequired('#category', 'Vui lòng nhập tên thể  '),
            Validator.isRequired('#quantity', 'Vui lòng nhập số lượng'),
            Validator.minLength('#quantity', 1),
            Validator.isNumber('#quantity'),
            Validator.isRequired('#promo_price', 'Vui lòng nhập giá tiền'),
            Validator.minLength('#promo_price', 1),
            Validator.isPrice('#promo_price', 'sai định dạng ex:10,000'),
            Validator.isRequired('#import_price', 'Vui lòng nhập giá tiền'),
            Validator.minLength('#import_price', 1),
            Validator.isPrice('#import_price', 'sai định dạng ex:10,000'),
        ],
        onSubmit: function (data) {
            const inputPriviewImage = document.getElementById('img-product');
            data.MainImage = inputPriviewImage.getAttribute('data-img');

            const payload = JSON.stringify({ data });
            fetch('http://localhost/admin/manager-product/add-product', {
                method: 'post',
                body: payload,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        MessageBox('thêm sản phẩm thành công', 'thông báo');
                    } else {
                        MessageBox('lỗi thêm sản phẩm', 'error');
                    }
                });
        },
    });
    const buttonSubmit = document.getElementById(
        'button-form-edit-product-submit'
    );
    buttonSubmit.addEventListener('click', () => {
        const form = document.getElementById('form-add-new-product');
        form.requestSubmit();
    });
    const buttonChangeImage = document.getElementById('button-change-image');
    const inputSelectorImage = document.getElementById('input-selector-img');
    const inputPriviewImage = document.getElementById('img-product');
    const buttondeleteImg = document.getElementById('btn-delete-img-product');
    const buttonDeleteProduct = document.getElementById(
        'button-manager-product-delete'
    );

    buttondeleteImg.addEventListener('click', () => {
        inputPriviewImage.src =
            'http://localhost/assets/Db_img/default-img-product.png';
        inputPriviewImage.setAttribute('data-img', 'default-img-product.png');
    });
    buttonChangeImage.addEventListener('click', () => {
        inputSelectorImage.click();
    });
    inputSelectorImage.addEventListener('change', () => {
        const [file] = inputSelectorImage.files;
        if (file) {
            inputPriviewImage.src = URL.createObjectURL(file);

            inputPriviewImage.setAttribute('data-img', file.name);
        }
    });
}
