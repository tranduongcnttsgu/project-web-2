 <style>
     .pagination {
         max-width: 1200px;
         width: 100%;
         height: 50px;
         margin: 0 auto;
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .pagination-líst {
         width: auto;
         display: flex;
         column-gap: 10px;
     }

     .pagination-item {
         width: 30px;
         padding: 5px;
         text-align: center;
         border: none;
         border-radius: 4px;
         box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
         margin: 0 3px;
         cursor: pointer;
         color: #666666;
     }

     .pagination-item:hover {
         border: 1px solid;
     }

     .pagination-item.active {
         color: black;
         font-weight: 800;
         border: 1px solid red;
     }

     .number {
         padding-left: 10px;
         padding-right: 10px;
     }
 </style>
 <div class="pagination">
     <ul class="pagination-líst">
         <li class="pagination-item"><i class="fa-solid fa-angles-left"></i></li>
         <li class="pagination-item number active">1</li>
         <li class="pagination-item number">1</li>
         <li class="pagination-item number">1</li>
         <li class="pagination-item number">1</li>
         <li class="pagination-item "><i class="fa-solid fa-angles-right"></i></li>
     </ul>
 </div>