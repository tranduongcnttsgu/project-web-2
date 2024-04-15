# client

-   tác dụng:điều khiển hiển thị layout và truyên các tham số

```php
 public function PageName()
   {
       $params = []; -> biến truyền vào
       example: [
           style => link
           image => link
       ]

       return $this->render('pageName', $params); -> hàm dùng đẻ gọi tới router -> render ra view
   }
```

# productController

-   tác vụ: sử lý dự liệu với product
