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
const useDebounce = (fn, delay) => {
    delay = delay || 200;
    let timerId;
    return () => {
        if (timerId) {
            clearInterval(timerId);
        }
        timerId = setTimeout(() => {
            fn();
        }, delay);
    };
};
window.useDebounce = useDebounce;
window.MessageBox = MessageBox;
window.render = render;
window.html = html;
