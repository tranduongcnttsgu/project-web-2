import html from '../../redux/core.js';
import { connect } from '../setup.js';
const connector = connect((state) => ({
    popup: state.popup,
}));
//  1 => show
//  2 => cancel
//  3 => agree
const popup = ({ popup }) => {
    const buttonColor = popup.acceptType === 'user/cart/order';
    return html`
        <div class="popup-wrapper ${popup.show ? 'show' : ''}">
            <div class="modelBoxWrapper ${popup.show ? 'show' : ''} ">
                <header class="modelBox-header">
                    <i class="fa-solid fa-envelope"></i>
                    <h2>Thông báo</h2>
                </header>

                <div class="modelBox-message">
                    <p class="message">${popup.message}</p>
                </div>

                <div class="modelBox-buttons">
                    <button
                        class="modelBox-button ${buttonColor ? '' : 'stant'}"
                        id="acceptBtn"
                        onclick="dispatch('${popup.type}',2)"
                    >
                        Không
                    </button>
                    <button
                        class="modelBox-button"
                        id="declineBtn"
                        onclick="dispatch('${popup.acceptType}',${popup
                            .payload[0]})"
                    >
                        Đồng ý
                    </button>
                </div>
            </div>
        </div>
    `;
};
export default connector(popup);
