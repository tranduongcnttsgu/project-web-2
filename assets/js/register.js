document.addEventListener('DOMContentLoaded', () => {
    Validator({
        form: '#form',
        formGroupSelector: '.input-box',
        errorSelector: '.handle-error',
        rules: [
            Validator.isRequired('#name', 'Vui lòng nhập tên của bạn!'),
            Validator.isRequired('#email', 'Vui lòng nhập email của bạn!'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password', 'Vui lòng nhập mật khẩu của bạn!'),
            Validator.minLength('#password', 6),
            Validator.isRequired(
                '#password-confirm',
                'Vui lòng nhập mật khẩu của bạn!'
            ),
            Validator.isConfirmed(
                '#password-confirm',
                function () {
                    return document.querySelector('#form #password').value;
                },
                'Mật khẩu nhập lại không chính xác!'
            ),
        ],
        onSubmit: function (data) {
            const payload = JSON.stringify({ info: data });
            fetch('http://localhost/user/account/register', {
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
                        const payload = new URLSearchParams();
                        payload.set('email', data.data.email);
                        payload.set('password', data.data.password);
                        fetch('http://localhost/account/login', {
                            method: 'post',
                            body: payload,
                            headers: {
                                'Content-Type':
                                    'application/x-www-form-urlencoded; charset=UTF-8',
                            },
                        })
                            .then((res) => res.json())
                            .then((data) => {
                                if (data.success) {
                                    return (window.location.href =
                                        'http://localhost');
                                }
                            });
                    } else {
                        MessageBox('Thông báo', 'Email đã tồn tại!', 'Error');
                    }
                });
        },
    });
});
