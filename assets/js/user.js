const checkUser = async () => {
    const req = await fetch('http://localhost/account/user-info-login');
    const res = await req.json();
    if (!res.success) {
        return (window.location.href = 'http://localhost/account');
    }
    if (res.success && +res.type === 1) {
        return (window.location.href = 'http://localhost/admin');
    }
};
checkUser();

//===================== form updata info user ==============================

const priviewAvatarUser = document.getElementById('previewImage-avatar-user');
const buttonEditAvatarUser = document.getElementById('input-avatar-user-lable');
const changeAvatarUser = (inputImageAvatarUser) => {
    inputImageAvatarUser.click();
};
const priviewAvatar = (inputImageAvatarUser, priviewAvatarUser) => {
    const [file] = inputImageAvatarUser.files;
    if (file) {
        priviewAvatarUser.src = URL.createObjectURL(file);
    }
};
const formChangeInfoUserSubmit = (button, input) => {
    const value = input.value;
    const parent = button.parentElement;
    const message = button.parentElement.querySelector(
        '#error-message-name-field'
    );
    if (value.trim().length === 0) {
        message.innerText = 'thông tin không được để trống';
    } else if (value.trim().length < 7) {
        message.innerText = 'tên quá ngắn';
    } else {
        parent.onsubmit = (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log(input.value);
        };
    }
};
const handleAddProductOrder = (ele, productId) => {
    if (ele.checked === true) {
        dispatch('user/cartProduct/addoneOrder', productId);
    } else if (ele.checked === false) {
        console.log('ddlele');
    }
};
