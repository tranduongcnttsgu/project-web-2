const getInfoUser = async () => {
    const req = await fetch('http://localhost/account/user-info-login');
    const res = await req.json();
    return res.data.data;
};
const user = await getInfoUser();
console.log(user);
const listInput = document.querySelectorAll(' .form-group input ');
const inputs = [...listInput];
const infoAddress = document.getElementById('info-address');
const infoPhone = document.getElementById('info-phone');
const infoEmail = document.getElementById('info-email');
infoAddress.innerHTML = `  <span>Địa chỉ:</span>
                   ${user.address ? user.address : 'chưa được cập nhật'}`;
infoPhone.innerHTML = `
                     <span>Số điện thoại:</span>
                       ${user.phone ? user.phone : 'chưa được cập nhật'}
                   `;
infoEmail.innerHTML = `
     <span>email:</span>
                   ${user.email}
                </p>
`;
console.log(inputs);
inputs.map((input) => {
    if (input.id === 'fullName') {
        input.value = user.name;
    } else if (input.id === 'phone') {
        input.value = user.phone;
    } else if (input.id === 'emailInfo') {
        input.value = user.email;
    } else if (input.id === 'nickname') {
        input.value = user.nickname;
    } else if (input.id === 'address') {
        input.value = user.address;
    }
});
const buttonPayment = document.getElementById('button-payment');
buttonPayment.addEventListener('click', () => {
    const name = inputs[0].value.length === 0;
    const address = inputs[4].value.length === 0;
    const phone = inputs[1].value.length === 0;
    if (name || address || phone) {
        MessageBox('thông báo', 'bạn không được để trống thông tin', 'error');
        return;
    }
    fetch('http://localhost/user/order', {
        method: 'post',
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                window.location.href = 'http://localhost/account/user/order';
            }
        });
});
const formInfo = document.getElementById('form-info');
Validator({
    form: '#form-info',
    formGroupSelector: '.form-group',
    errorSelector: '.error-message',
    rules: [
        Validator.isEmail('#emailInfo'),

        Validator.isRequired('#fullName', 'Vui lòng nhập tên đầy đủ của bạn'),
        Validator.minLength('#fullName', 2),
        Validator.isRequired('#address', 'Vùi lòng nhập tài khoản của bạn'),
        Validator.minLength('#address', 12),
        Validator.isRequired('#emailInfo', 'Vui lòng nhập email của bạn'),
        Validator.isEmail('#emailInfo'),
        Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
        Validator.isNumber('#phone'),
        Validator.minLength('#phone', 10),
    ],
    onSubmit: function (data) {
        const payload = new URLSearchParams(new FormData(formInfo));
        console.log(data);
        fetch('http://localhost/user/update-info', {
            method: 'post',
            body: payload,
        })
            .then((res) => res.json())
            .then((data) => window.location.reload());
    },
});
