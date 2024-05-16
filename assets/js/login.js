document.addEventListener('DOMContentLoaded', () => {
    Validator({
        form: '#form-login',
        formGroupSelector: '.input-box',
        errorSelector: '.form-message',
        rules: [
            Validator.isEmail('#email'),
            Validator.minLength('#password', 6),
        ],
        onSubmit: function (data) {
            const payload = new URLSearchParams();
            payload.set('email', data.username);
            payload.set('password', data.password);
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
                    console.log(data);
                    if (data.code === 404) {
                        MessageBox('', 'Tài khoản  không  tồn tại', 'error');
                        return;
                    } else if (data.code === 200 && !data.success) {
                        MessageBox('', 'Mật khẩu   không đúng', 'error');
                        return;
                    } else if (data.code === 403) {
                        MessageBox(
                            '',
                            'tài khoản của bạn  đã bị chặn',
                            'error'
                        );
                        return;
                    }
                    if (data.info.action_group === 0) {
                        window.location.href = 'http://localhost';
                    } else if (data.info.action_group === 1) {
                        window.location.href = 'http://localhost/admin';
                    }
                });
        },
    });
});
