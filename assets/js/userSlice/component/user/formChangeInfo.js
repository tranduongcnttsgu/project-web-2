import html from '../../../redux/core.js';
import { connect } from '../../setup.js';
const connector = connect((state) => ({
    userData: state.userData,
}));
const formChangeInfo = ({ userData }) => {
    return html`
        <h3 class="user-info-change-title">Thông Tin Cá Nhân</h3>
        <form
            action=""
            class="user-form-update-info"
            id="form-change-info-user"
        >
            <div class="form-info">
                <div class="user-input-box avatar-priview">
                    <input
                        type="file"
                        id="input-avatar-user"
                        name="user-avatar"
                        title="&nbsp;"
                        onchange="priviewAvatar(this,document.getElementById('previewImage-avatar-user'))"
                    />
                    <img
                        id="previewImage-avatar-user"
                        src="${userData.avatar}"
                    />
                    <label
                        for=""
                        id="input-avatar-user-lable"
                        onclick="changeAvatarUser(document.getElementById('input-avatar-user'))"
                        ><i class="fa-solid fa-pen-to-square"></i
                    ></label>
                    <span class="error-message-form-user"></span>
                </div>
                <div class="form-info-user">
                    <div class="user-input-box">
                        <label for="input-name-user">họ tên</label>
                        <input
                            type="text"
                            id="input-name-user"
                            name="user-avatar"
                            value="${userData.name}"
                        />

                        <span
                            style="color:red;"
                            class="error-message-form-user"
                            id="error-message-name-field"
                        ></span>
                    </div>
                </div>
            </div>
            <button
                type="button"
                class="user-info-button-sumit"
                id="user-info-button-sumit"
                onclick="formChangeInfoUserSubmit(this,document.getElementById('input-name-user'))"
            >
                cập nhật thông tin
            </button>
        </form>
    `;
};
export default connector(formChangeInfo);
