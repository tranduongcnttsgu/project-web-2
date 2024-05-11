import html from './../redux/core.js';
import { connect } from './setup.js';
const connector = connect((state) => {
    return { paginationData: state.pagination };
});
const pagiantion = ({ paginationData }) => {
    function NewArray(size) {
        let x = [];
        for (let i = 1; i <= size; ++i) {
            x[i] = i;
        }
        return x;
    }
    const pages = NewArray(+paginationData.totalPage);
    const start = paginationData.start;
    const end = paginationData.end;
    const totalProduct = paginationData.totalProduct;
    const currentPage = paginationData.currentPage;
    return html`
        <ul class="list-pagination">
            <button
                class="pagination-prev"
                onclick="dispatch('user/prevPage')"
                ${start === 0 ? 'disabled' : ''}
            >
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            ${pages.map((page) => {
                return `
                  <li class="pagiantion-number
                   ${currentPage === page ? 'active' : ''}
                  "
                   onclick = "dispatch('user/changePage',${page})"
                  >${page}</li>
                `;
            })}

            <button
                class="pagination-next"
                onclick="dispatch('user/nextPage')"
                ${end === totalProduct ? 'disabled' : ''}
            >
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </ul>
    `;
};
export default connector(pagiantion);
