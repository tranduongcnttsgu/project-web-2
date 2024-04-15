function html([first, ...strings], ...values) {
    return values
        .reduce((acc, cur) => acc.concat(cur, strings.shift()), [first])
        .filter((x) => (x && x !== true) || x === 0)
        .join('');
}
function render(idRoot, html) {
    document.getElementById(idRoot);
    idRoot.innerHTML = html;
}
const MessageBox = (
    title = '',
    message = '',
    type = 'success',
    duration = 3000
) => {
    const main = document.getElementById('messageBox');
    if (main) {
        const toast = document.createElement('div');
        const autoRemoveId = setTimeout(() => {
            main.removeChild(toast);
        }, duration + 1000);
        toast.onclick = (e) => {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast);
                clearInterval(autoRemoveId);
            }
        };
        const icons = {
            success: 'fas fa-check-circle',
            info: 'fas fa-info-circle',
            warning: 'fas fa-exclamation-circle',
            error: 'fas fa-exclamation-circle',
        };

        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);
        toast.classList.add('toast', `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
    `;
        main.appendChild(toast);
    }
};
const Notify = () => {
    const Notify = (message) => {
        const container = document.getElementById('notifiBox');
        container.classList.add('active');
        const html = `
       <div id="notifi-header">thông báo</div>
      <div id="notify-body">
           ${message} 
        
      </div>
    <div id="notify-bottom">
    <button id="notify-bottom-btn-left" onclick=" handleCloseBtnNotify()">
        hủy bỏ
    </button>
    <button id="notify-bottom-btn-right" onclick="handleBtnAgree()">
        đồng ý
    </button>
</div>`;
        container.innerHTML = html;
    };
    const state = false;
    const handleCloseBtnNotify = () => {
        const notify = document.getElementById('notifiBox');
        notify.classList.remove('active');
        return state;
    };
    const handleBtnAgree = () => {
        const notify = document.getElementById('notifiBox');

        notify.classList.remove('active');
        state = true;
        return state;
    };
    return {
        Notify,
        state,
        handleBtnAgree,
        handleCloseBtnNotify,
    };
};
window.Notify = Notify;
window.MessageBox = MessageBox;
window.render = render;
window.html = html;
