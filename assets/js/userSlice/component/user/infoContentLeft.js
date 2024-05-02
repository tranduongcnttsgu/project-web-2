import html from '../../../redux/core.js';
import { connect } from '../../setup.js';
const connector = connect((state) => ({
    userData: state.userData,
}));
const Avatar = ({ userData }) => {
    return html`
        <div class="user-info-phone-email">
            <h3 class="user-info-phone-email-title">Số điện thoại và Email</h3>
            <div class="user-info-content-phone-email">
                <div class="user-info-phone">
                    <span class="icon-phone">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <div class="info-phone-content">
                        <span>số điện thoại</span>
                        <span>${userData.phone}</span>
                    </div>
                </div>
                <div
                    class="button-edit-info-phone "
                    style=" visibility: hidden;"
                >
                    cập nhật
                </div>
            </div>
            <div class="user-info-content-phone-email">
                <div class="user-info-phone">
                    <span class="icon-phone">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <div class="info-phone-content">
                        <span>email</span>
                        <span>${userData.email}</span>
                    </div>
                </div>
                <div
                    class="button-edit-info-phone"
                    style=" visibility: hidden;"
                >
                    cập nhật
                </div>
            </div>
        </div>
    `;
};
export default connector(Avatar);
