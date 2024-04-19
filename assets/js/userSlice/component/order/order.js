import html from '../../../redux/core.js';
import { connect } from '../../setup.js';
const connector = connect((state) => ({
    userOrder: state.userOrder,
}));
const listOrder = ({ userOrder }) => {
    const formatPrice = (price) => {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return VND.format(price * 1000);
    };
    const statusStransport = (status) => {
        if (status === 0) {
            return 'đang chờ xác nhận';
        } else if (status === 1) {
            return 'đang giao hàng';
        } else if (status === 2) {
            return 'đã giao hàng';
        } else return 'đã hủy hàng';
    };
    const styleStatusStransport = (status) => {
        if (status == 0) {
            return 'red';
        } else if (status === 1) {
            return 'blue';
        } else return 'black';
    };
    return html`
        ${userOrder.map((data) => {
            return `
                  <li class="item-order-detail">
            <h5 class="order-detail-status-title">
            <i class="fa-regular fa-bell"></i>
                trạng thái: <span class="
                
                "
                 style = "color:${styleStatusStransport(
                     +data.order.status_stransport
                 )}"
                >
                   ${statusStransport(+data.order.status_stransport)}
                
                </span>
               
            </h5>
            <div class="list-order-detail-wrapper">
               ${data.orderDetail.map((product) => {
                   return html`
                       <div class="item-order-detail-content-wrapper">
                           <img
                               src="${product.product_image}"
                               alt=""
                               class="img-order-detail"
                           />
                           <div class="content-order-detail">
                               <div class="content-order-detail-name">
                                   ${product.product_name} x
                                   <span style="color:red;">
                                       ${product.quantity}
                                   </span>
                               </div>
                               <div class="content-order-detail-price">
                                   ${formatPrice(product.totail_price)}
                               </div>
                           </div>
                       </div>
                   `;
               })}
               
            </div>
            <div class="status-order-detail"
             style="  ${
                 +data.order.status_payment === -1
                     ? 'display:none;'
                     : ' display:flex'
             }"
            >
                <div
                 style = "width:400px; height:100%;
                  display:flex;   flex-direction: column;
                  row-gap:5px;
                   
                   
                  
                 "
                > 
                 <div>tổng tiền đã thanh toán:
                   ${
                       data.order.status_payment === 0
                           ? '0 đ'
                           : `${formatPrice(+data.order.totail_price)}`
                   }
                 </div>
                  <div> tổng tiền đơn hàng: ${formatPrice(
                      +data.order.totail_price
                  )}</div>
                 </div
                 
                 > 
                 <div  style=" ${
                     +data.order.status_stransport === 2
                         ? 'visibility: hidden;'
                         : '  visibility: visible;'
                 }">         
                 ${
                     data.order.status_payment === 0
                         ? ' <button class="btn-status order-delete">hủy đơn hàng</button>'
                         : ' <button class="btn-status received ">xác nhận đã nhận hàng</button>'
                 }
                 </div>  
            </div>
        </li>
            
            `;
        })}
    `;
};
export default connector(listOrder);
