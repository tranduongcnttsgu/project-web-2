const listFlash = document.getElementById('list-news-flash');
const make = () => {
    [...listFlash.children].map((ele, index) => {
        const value = --index * 100;
        ele.setAttribute(
            'style',
            `top:${value}%;
        ${index !== 0 ? 'opacity:0;' : 'opacity:1;'}
     
        `
        );
    });
};
make();
const nextItem = () => {
    const listFlash = document.getElementById('list-news-flash');
    listFlash.appendChild(listFlash.children[0]);
    make();
};
setInterval(() => {
    nextItem();
}, 5000);
// open menu
const buttonOpentMenu = document.getElementById('ele-phone-click-open-menu');
const phoneMenu = document.getElementById('ele-wrapper-phone-header-menu');
const buttonCloseMenu = document.getElementById('ele-phone-button-close-menu');
buttonOpentMenu.addEventListener('click', () => {
    phoneMenu.classList.toggle('active');
});
buttonCloseMenu.addEventListener('click', (e) => {
    if (e.target.id === 'ele-phone-button-close-menu') {
        phoneMenu.classList.toggle('active');
        console.log(e.target);
    }
});
phoneMenu.addEventListener('click', (e) => {
    if (e.target.id === 'ele-wrapper-phone-header-menu') {
        phoneMenu.classList.toggle('active');
        console.log(e.target);
    }
});
const itemAccount = document.getElementById('item-account');
itemAccount.addEventListener('click', async () => {
    const checkUserlogin = localStorage.getItem('userLogin')
        ? localStorage.getItem('userLogin')
        : false;
    if (!checkUserlogin) {
        window.location.href = 'http://localhost/account';
    }
    window.location.href = 'http://localhost/account/user';
});
const searchBox = document.getElementById('header-submit-search-product');
searchBox.addEventListener('submit', (event) => {
    event.preventDefault();
    event.stopPropagation();

    const payload = new URLSearchParams(new FormData(searchBox));
    const searchKey = payload.get('searchKey');

    dispatch('user/search', searchBox);
});
