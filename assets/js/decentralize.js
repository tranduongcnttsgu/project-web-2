const name_permission = 'phần Quyền';
let permission = {};
const buttonAddAccount = document.getElementById(
    'button-decentralize-add-accout'
);
const buttonDelete = document.querySelectorAll('#button-decentralize-delete');
const buttonEdit = document.querySelectorAll('#button-decentralize-edit');
console.log(buttonAddAccount);
const checkPermissions = async () => {
    const req = await fetch('http://localhost/admin/check-permission');
    const res = await req.json();
    permission = res.data.find((role) => {
        return role.permission.service === name_permission;
    }).service;
    if (permission.action_create === 0) {
        buttonAddAccount.classList.add('button-none');
    }
    if (permission.action_delete === 0) {
        buttonDelete.forEach((ele) => {
            ele.classList.add('button-none');
        });
    }
    if (permission.action_update === 0) {
        buttonEdit.forEach((ele) => {
            ele.classList.add('button-none');
        });
    }

    console.log(permission);
};
checkPermissions();
