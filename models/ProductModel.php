<?php

namespace models;

use PDO;
use PDOException;
use core\Model;
use dto\categories;
use dto\Author;
use dto\Order;
use dto\OrderDetail;
use dto\Products;

class ProductModel extends Model
{


    public function getCategory()
    {
        $data = $this->getAll("product_categorys");
        $listCategory = [];
        foreach ($data as $key => $value) {
            $category = new categories();
            if (isset($value["name"])) {
                $category->setName($value["name"]);
            }
            if (isset($value["category_id"])) {
                $category->setCategory_id($value["category_id"]);
            }
            $listCategory[] = $category;
        }

        return $listCategory;
    }
    public function  getNewProduct()
    {
        return $this->findAll("products", ["status=?"], [1], "update_at DESC", "0,9");
    }
    public function getAuthor()
    {
        $data = $this->getAll("authors");
        $listAuthor = [];
        foreach ($data as $key => $value) {
            $author = new Author();
            if (isset($value["name"])) {
                $author->setName($value["name"]);
            }
            if (isset($value["authorId"])) {
                $author->setAuthorId($value["authorId"]);
            }
            $listAuthor[] = $author;
        }

        return $listAuthor;
    }
    public function getProduct($start, $end)
    {
        $listProduct = $this->getAll("products", "$start ,$end");
        return $listProduct;
    }
    public function userSearch($searchKey = "", $limit, $condition = false, $sort = false)
    {
        $result = [];
        $totalResult = [];
        $searchKey =  trim(strtolower($searchKey));

        if ($condition !== false && strcmp($condition[0], "category") === 0 && $sort === false) {
            $category = $this->get("product_categorys", ["category_id = ?"], [$condition[1]]);
            $result = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.category_id = ?"], ["%$searchKey%", $category["category_id"]], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name)LIKE ?", "products.category_id = ?"], ["%$searchKey%", $category["category_id"]], false);
        } else if (
            $condition !== false

            && strcmp($condition[0], "author") === 0 && $sort === false
        ) {
            $author = $this->get("authors", ["authors.authorId =?"], [$condition[1]]);
            $result = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.authorId = ?"], ["%$searchKey%", $author["authorId"]], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.authorId = ?"], ["%$searchKey%", $author["authorId"]], false);
        } else if ($condition !== false     && strcmp($condition[0], "author") === 0 && $sort !== false) {
            $author = $this->get("authors", ["authorId =?"], [$condition[1]]);
            $result = $this->findAll("products", ["LOWER(products.name)  LIKE ? ", "products.authorId = ?", "products.promo_price BETWEEN  ? AND ?  "], ["%$searchKey%", $author["authorId"], $sort[0], $sort[1]], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name) LIKE ? ", "products.authorId  = ?", "products.promo_price BETWEEN  ? AND  ?  "], ["%$searchKey%", $author["authorId"], $sort[0], $sort[1]], false);
        } else if ($condition !== false && strcmp($condition[0], "category") === 0 && $sort !== false) {
            $category = $this->get("product_categorys", ["category_id =?"], [$condition[1]]);
            $result = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.category_id = ?", "products.promo_price BETWEEN ? AND ?"], ["%$searchKey%", $category["category_id"],  $sort[0], $sort[1]], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.category_id = ?", "products.promo_price BETWEEN ? AND ? "], ["%$searchKey%", $category["category_id"], $sort[0], $sort[1]], false);
        } else if ($sort !== false) {
            $result = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.promo_price  BETWEEN ? AND  ?"], ["%$searchKey%", $sort[0], $sort[1]], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name) LIKE ?", "products.promo_price BETWEEN ? AND ?"], ["%$searchKey%", $sort[0], $sort[1]], false);
        } else {
            $result = $this->findAll("products", ["LOWER(products.name) LIKE ?"], ["%$searchKey%"], false, $limit);
            $totalResult = $this->findAll("products", ["LOWER(products.name) LIKE ?"], ["%$searchKey%"], false);
        }

        // Đếm tổng số kết quả
        $totalResultCount = sizeof($totalResult);

        return ["data" => $result, "totalResult" => $totalResultCount];
    }
    public function getCart($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products,cart WHERE cart.product_id = products.product_id AND cart.user_id =?; ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getOrders($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM orders WHERE orders.customer_id =?  AND status =1";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getOrderDetail($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM orders,orders_detail WHERE orders.customer_id =?
             AND orders.order_id = orders_detail.order_id  AND orders.status =1
            ; ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function addProductToCart($userId = "", $productId = "", $quantity = 1)
    {
        $check = $this->get("cart", ["user_id = ?", "product_id= ?"], [$userId, $productId]);
        if ($check !== false) {
            return false;
        }
        $addProduct = $this->insert("cart", "product_id,user_id,quantity_purchased", [$productId, $userId, $quantity]);
        return $addProduct;
    }

    public function deleteProductOnCart($userId = "", $productId = "")
    {
        $conditions = ["user_id =?", "product_id =?"];
        $values = [$userId, $productId];
        $table = "cart";
        $data = $this->delete($table, $conditions, $values);
        return $data;
    }
    public function deleteManyProductToOrder($userId)
    {
        $check = $this->get("orders", ["customer_id=?", "status =?"], [$userId, 1]);
        if ($check) {
            $orderId = $check["order_id"];
            $this->update("orders", ["totail_product", "totail_price"], [0, 0], ["order_id =?", "customer_id=?"], [$orderId, $userId]);
            return $this->delete("orders_detail", ["order_id=?"], [$orderId]) ?? false;
        }
    }
    public function getInfoProductDetail($productId)
    {
        $product = $this->get("products", ["product_id=?"], [$productId]);

        return $product ?? null;
    }
    public function addOneProductToOrder($userId, Order $order, OrderDetail $orderDetail)
    {
        $table = "orders";
        $columns = "order_id, status,message_status, customer_id, totail_product, status_payment,message_status_payment, status_stransport, totail_price";
        $values = [
            $order->getOrder_id(),
            $order->getStatus(),
            $order->getMessage_status(),
            $order->getCustomer_id(),
            $order->getTotal_product(),
            $order->getStatus_payment(),
            $order->getMessage_status_payment(),
            $order->getStatus_transport(),
            $order->getTotal_price()
        ];





        $orderDetailTable = "orders_detail";
        $orderDetailColumns = "product_id, product_name, product_image, delivered, price, totail_price, status, quantity, order_id";
        $orderDetailValues = [
            $orderDetail->getProduct_id(),
            $orderDetail->getProduct_name(),
            $orderDetail->getProductImage(),
            $orderDetail->getDelivered(),
            $orderDetail->getPrice(),
            $orderDetail->getTotal_price(),
            $orderDetail->getStatus(),
            $orderDetail->getQuantity(),

        ];
        $checkOrder  = $this->get("orders", ["customer_id =?", "status=?"], [$userId, 1]);

        if ($checkOrder) {
            array_push($orderDetailValues, $checkOrder["order_id"]);
            $this->insert($orderDetailTable, $orderDetailColumns, $orderDetailValues) ?? false;
            return $this->update("orders", ["totail_product", "totail_price"], [(int)$checkOrder["totail_product"] + 1, (int)$checkOrder["totail_price"] + (int)$orderDetail->getTotal_price()], ["customer_id =?", "status=?"], [$userId, 1]);
        }
        array_push($orderDetailValues, $order->getOrder_id());

        $this->insert($table, $columns, $values);
        return $this->insert($orderDetailTable, $orderDetailColumns, $orderDetailValues) ?? false;
    }
    public function deleteOneProductInOrder($userId, $productId)
    {
        $checkConditions = ["customer_id =?", "status =?"];
        $valuesConditons = [$userId, 1];
        $checkProduct = $this->get("orders", $checkConditions, $valuesConditons) ?? false;
        if (!$checkProduct) {
            return null;
        }

        $orderId = $checkProduct["order_id"];
        $orderDetailCondition = ["order_id = ?", "product_id =?"];
        $orderDetailValue  = [$orderId, $productId];
        $productDelete = $this->get("orders_detail", $orderDetailCondition, $orderDetailValue);
        $delete = $this->delete("orders_detail", $orderDetailCondition, $orderDetailValue);


        $updateOrderColumn = ["totail_product", "totail_price"];
        $updateOrderValue = [(int)$checkProduct["totail_product"] - 1, (int)$checkProduct["totail_price"] - (int)$productDelete["totail_price"]];
        $updateConditions = ["customer_id =?", "status =?"];
        $updateValueConditions = [$userId, 1];
        $updateOrder = $this->update("orders", $updateOrderColumn, $updateOrderValue, $updateConditions, $updateValueConditions);
        return $updateOrder ?? false;
    }
    public   function userProductDetailOrder($check, $product, $userId)
    {
        $totalPrice = (int) $product["promo_price"] * (int)$product["quantity_buy"];
        if ($check === true) {
            $deleteProductOnCart = $this->delete("cart", ["user_id=?", "product_id=?"], [$userId, $product["product_id"]]);
        }
        $currentOrders = $this->get("orders", ["customer_id=?", "status=?"], [$userId, 1]);
        $deleteProductInOrderDetail = $this->delete("orders_detail", ["order_id=?"], [$currentOrders["order_id"]]);
        $deleteCurrentOrders = $this->delete("orders", ["order_id=?"], [$currentOrders["order_id"]]);

        $colums = $table = "orders";
        $columns = "order_id, status,message_status, customer_id, totail_product, status_payment,message_status_payment, status_stransport, totail_price";
        $orderId = $this->autoId();
        $valueOrders = [$orderId, 1, "Đang chở xác nhận", $userId, 1, 0, "chưa thanh toán", 0, $totalPrice];
        $newOrderS = $this->insert($table, $columns, $valueOrders);
        $orderDetailTable = "orders_detail";
        $orderDetailColumns = "product_id, product_name, product_image, delivered, price, totail_price, status, quantity, order_id";
        $orderDetailValue =  [$product["product_id"], $product["name"], $product["MainImage"], 0, $product["promo_price"], $totalPrice, 1, $product["quantity_buy"], $orderId];
        $newOrderDetail = $this->insert($orderDetailTable, $orderDetailColumns, $orderDetailValue);
        if ($newOrderS === false || $newOrderDetail === false) {
            return false;
        }
        return true;
    }
    public  function userGetOrders($userId)
    {
        $result = [];
        $orders = $this->findAll("orders", ["customer_id=?", "status=?"], [$userId, 2], "order_date DESC");
        foreach ($orders as $key => $value) {
            $orderDetail = $this->findAll("orders_detail", ["order_id=?"], [$value["order_id"]]);
            array_push($result, ["order" => $value, "orderDetail" => $orderDetail]);
        }
        return $result;
    }
    public function adminGetOrders()
    {
        $orders =  $this->findAll("orders", ["status=?"], [2], "order_date DESC");
        $result = [];
        foreach ($orders as $key => $value) {
            $user = $this->get("users", ["user_id=?"], [$value["customer_id"]]);
            array_push(
                $result,
                ["order" => $value, "customer" => $user]
            );
        }
        return $result;
    }
    public function adminGetImports()
    {
        $imports =  $this->findAll("imports", ["status=?"], [1], "import_date DESC");
        $result = [];
        foreach ($imports as $key => $value) {
            $supplier = $this->get("suppliers", ["supplier_id=?"], [$value["supplier_id"]]);
            array_push(
                $result,
                ["import" => $value, "supplier" => $supplier]
            );
        }
        return $result;
    }
    public function adminMangerOrderSordByDate($date_start, $data_end)
    {
        $data = [];
        $orders = $this->findAll("orders", ["order_date between ? AND ?", "status=?"], [$date_start, $data_end, 2], "update_at  DESC");
        foreach ($orders as $key => $value) {
            $user = $this->get("users", ["user_id=?"], [$value["customer_id"]]);
            array_push($data, ["order" => $value, "user" => $user]);
        }
        return $data;
    }
    public function adminGetInfoOrder($orderId)
    {
        $order = $this->get("orders", ["order_id=?"], [$orderId]);
        $customer = $this->get("users", ["user_id=?"], [$order["customer_id"]]);
        $orderDetail = $this->findAll("orders_detail", ["order_id=?"], [$orderId]);
        return ["customer" => $customer, "order" => $order, "orderDetail" => $orderDetail];
    }
    public function adminGetInfoImport($importId)
    {
        $import = $this->get("imports", ["import_id=?"], [$importId]);
        $supplier = $this->get("users", ["user_id=?"], [$import["customer_id"]]);
        $importDetail = $this->findAll("imports_detail", ["import_id=?"], [$importId]);
        return ["customer" => $supplier, "order" => $import, "importDetail" => $importDetail];
    }
    public function adminUpdateStatusOrder($orderId, $status, $status_transport)
    {
        $update = $this->update("orders", ["message_status", "status_stransport"], [$status, $status_transport], ["order_id=?"], [
            $orderId
        ]);
        return $update;
    }
    public function adminUpdateStatusImport($importId, $status, $status_transport)
    {
        $update = $this->update("imports", ["message_status", "status_stransport"], [$status, $status_transport], ["import_id=?"], [
            $importId
        ]);
        return $update;
    }
    public function userOrderUpdatePayment($orderId, $status)
    {
        $update = $this->update("orders", ["message_status_payment", "status_payment"], [$status, 1], ["order_id=?"], [
            $orderId
        ]);
        return $update;
    }
    public function usergetListProductPurchased($userId)
    {
        $result = [];
        $orders  = $this->findAll("orders", ["customer_id=?", "status_stransport=?"], [$userId, 2]);
        if ($orders === false || sizeof($orders) === 0) {
            return false;
        }
        foreach ($orders as $key => $value) {
            $orderDetail = $this->findAll("orders_detail", ["order_id=?"], [$value["order_id"]]);
            array_push($result, ["orders" => $value, "orderDetail" => $orderDetail]);
        }
        return $result;
    }
    public  function  adminGetListProduct($limit)
    {
        $listProduct = $this->findAll("products", ["status=?"], [1], "update_at  DESC", $limit);
        if (sizeof($listProduct) === 0 || $listProduct === false) {
            return false;
        }
        return $listProduct;
    }
    public function adminGetInfoProduct($productId)
    {
        $product = $this->get("products", ["product_id=?"], [$productId]);
        $author = $this->get("authors", ["authorId=?"], [$product["authorId"]]);
        $category = $this->get("product_categorys", ["category_id=?"], [$product["category_id"]]);
        $result = ["product" => $product, "author" => $author, "category" => $category];
        return $result;
    }
    public function adminShowProductList($limit)
    {
        $listProduct = $this->findAll("products", ["status=?"], [1], "update_at  DESC", $limit);
        if (sizeof($listProduct) === 0 || $listProduct === false) {
            return false;
        }
        return $listProduct;
    }
    public function adminManagerProductSearch($nameProduct, $category, $limit)
    {
        $listProduct = [];
        if ($category === false) {
            $listProduct = $this->findAll("products", ["LOWER(name) LIKE ?"], ["" . strtolower($nameProduct) . "%"], false, $limit);
        } else {
            $listProduct = $this->findAll("products", ["LOWER(name) LIKE ?", "category_id = ?"], ["%" . strtolower($nameProduct) . "%", $category], false, $limit);
        }
        if (sizeof($listProduct) === 0 || $listProduct === false) {
            return false;
        }
        return $listProduct;
    }
    public  function adminManagerProductAddNew(Author $author, categories $category, Products $product)
    {
        $checkAuthor = $this->findAll("authors", ["LOWER(name) like ?"], ["%" . strtolower($author->getName()) . "%"], false, 1);
        $checkCategory = $this->findAll("product_categorys", ["LOWER(name) like ?"], ["%" . strtolower($category->getName()) . "%"], false, 1);

        if (sizeof($checkAuthor) === 0 || $checkAuthor === false) {
            $authorTale = "authors";
            $authorColumn = "authorId,name";
            $authorValues = [$author->getAuthorId(), $author->getName()];
            $addNewAuthor = $this->insert($authorTale, $authorColumn, $authorValues);
        } else {
            $author->setAuthorId($checkAuthor[0]["authorId"]);
        }

        if (sizeof($checkCategory) === 0 || $checkCategory === false) {
            $categoryTable = "product_categorys";
            $categoryColumn = "category_id,name";
            $categoryValues = [$category->getCategory_id(), $category->getName()];
            $addNewCategory = $this->insert($categoryTable, $categoryColumn, $categoryValues);
        } else {
            $category->setCategory_id($checkCategory[0]["category_id"]);
        }
        $productTable = "products";
        $productColumn = "product_id,name,status,price,promo_price,quantity,category_id,authorId,MainImage,import_price, rating,totail_pay";
        $productValues = [
            $product->getProduct_id(), $product->getName(), 1, $product->getPrice(), $product->getPromo_price(), $product->getQuantity(), $category->getCategory_id(),
            $author->getAuthorId(), $product->getMainImage(), $product->getImport_price(), 0, 0
        ];
        $addnewProduct = $this->insert($productTable, $productColumn, $productValues);
        if ($addnewProduct === false) {
            return false;
        }
        return true;
    }
    public function adminManagerOrderSortOrderGetAll()
    {
        $data = [];
        $orders = $this->findAll("orders", ["status=?"], [2], "update_at  DESC");
        foreach ($orders as $key => $value) {
            $user = $this->get("users", ["user_id=?"], [$value["customer_id"]]);
            array_push($data, ["order" => $value, "user" => $user]);
        }
        return $data;
    }
    public    function adminManagerOrderSortOrder($status_transport, $status_payment)
    {
        $data = [];
        if ($status_transport !== false) {
            $orders = $this->findAll("orders", ["status_stransport=?", "status=?"], [$status_transport, 2], "update_at  DESC");
            foreach ($orders as $key => $value) {
                $user = $this->get("users", ["user_id=?"], [$value["customer_id"]]);
                array_push($data, ["order" => $value, "user" => $user]);
            }
        }
        if ($status_payment !== false) {
            $orders = $this->findAll("orders", ["status_payment=?", "status=?"], [$status_payment, 2], "update_at  DESC");
            foreach ($orders as $key => $value) {
                $user = $this->get("users", ["user_id=?"], [$value["customer_id"]]);
                array_push($data, ["order" => $value, "user" => $user]);
            }
        }
        if (sizeof($data) === 0) {
            return false;
        }
        return $data;
    }
    public function adminManagerProductUpdate(Products $product, categories  $category, Author $author)
    {
        $productOld = $this->getInfoProductDetail($product->getProduct_id());
        $product->setAuthorId($productOld["authorId"]);
        $product->setCategory_id($productOld["category_id"]);
        $categoryOfProduct = $this->get("product_categorys", ["category_id=?"], [$productOld["category_id"]]);
        $authorOfProduct = $this->get("authors", ["authorId=?"], [$productOld["authorId"]]);
        if (strcmp(strtolower($categoryOfProduct["name"]), strtolower($category->getName())) !== 0) {
            $category->setCategory_id($this->autoId());
            $checkCategory = $this->findAll("product_categorys", ["LOWER(name) like ?"], ["%" . strtolower($category->getName()) . "%"], false, 1);
            if (sizeof($checkCategory) !== 0) {
                $category->setCategory_id($checkCategory[0]["category_id"]);
            } else {
                $this->insert("product_categorys", "category_id,name", [$category->getCategory_id(), $category->getName()]);
            }
            $product->setCategory_id($category->getCategory_id());
        }
        if (strcmp(strtolower($authorOfProduct["name"]), strtolower($author->getName())) !== 0) {
            $author->setAuthorId($this->autoId());
            $checkAuthor = $this->findAll("authors", ["LOWER(name) like ?"], ["%" . strtolower($author->getName()) . "%"], false, 1);
            if (sizeof($checkAuthor) !== 0) {
                $author->setAuthorId($checkAuthor[0]["authorId"]);
            } else {
                $this->insert("authors", "authorId,name", [$author->getAuthorId(), $author->getName()]);
            }
            $product->setAuthorId($author->getAuthorId());
        }
        $update = $this->update("products", ["name", "price", "promo_price", "quantity", "category_id", "authorId", "MainImage", "import_price", "rating", "totail_pay"], [$product->getName(), $product->getPrice(), $product->getPromo_price(), $product->getQuantity(), $product->getCategory_id(), $product->getAuthorId(), $product->getMainImage(), $product->getImport_price(), 0, 0], ["product_id=?"], [$product->getProduct_id()]);
        if ($update === false) {
            return false;
        }
        return true;
    }
    public function adminManagerProductDelete($productId)
    {
        $delete = $this->delete("products", ["product_id=?"], [$productId]);
        if ($delete === false) {
            return false;
        }
        return true;
    }
}
