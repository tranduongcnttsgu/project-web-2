import html from '../../../redux/core.js';
import { connect } from '../../setup.js';
const connector = connect((state) => ({
    userData: state.userData,
}));
const Avatar = ({ userData }) => {
    return html`
        <div class="user-avatar">
            <img src="${userData.avatar}" alt="" />
        </div>
        <div class="user-info">
            <span class="user-info-title">Tài Khoản Của</span>
            <h3 class="user-info-name">${userData.name}</h3>
        </div>
    `;
};
export default connector(Avatar);
