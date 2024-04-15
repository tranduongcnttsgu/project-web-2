const init = {
    popup: {
        type: '',
        acceptType: '',
        show: false,
        accept: false,
        message: '',
        payload: [],
    },
};
const reducer = async (state = init, action, args) => {
    switch (action) {
        case 'admin/popup': {
            const prev = state.popup;
            let newPopup = { ...prev, show: false };
            if (+args[0] === 1) {
                newPopup = {
                    ...prev,
                    show: true,
                    message: 'bạn muốn đăng xuất',
                    type: 'admin/popup',
                    acceptType: 'admin/logout',
                    payload: [3],
                };
            } else if (+args[0] === 2) {
                newPopup = {
                    type: '',
                    acceptType: '',
                    show: false,
                    accept: false,
                    message: '',
                    payload: [],
                };
            }
            return {
                ...state,
                popup: newPopup,
            };
        }
        case 'admin/logout': {
            const req = await fetch('http://localhost/account/logout');
            const res = await req.json();
            window.location.href = 'http://localhost';
            const newPopup = {
                type: '',
                acceptType: '',
                show: false,
                accept: false,
                message: '',
                payload: [],
            };
            return {
                ...state,
                popup: newPopup,
            };
        }
        default:
            return state;
    }
};
export default reducer;
