<?php

namespace models;

use PDO;
use PDOException;
use core\Model;
use dto\categories;
use dto\Author;
use dto\Order;
use dto\OrderDetail;

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
    public function findByName($name = "")
    {

        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products";
            if (strlen($name) !== 0) {
                $sql .= " WHERE name LIKE '%" . ltrim($name) . "%' ";
            }


            $stmt = $conn->prepare($sql);
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
    function findByCateory($category  = "")
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products ";
            if (strlen($category) !== 0) {
                $sql .= "WHERE products.category_id= '" . $category . "' ";
            }


            $stmt = $conn->prepare($sql);
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
    public function findByAuthor($author = "")
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products ";
            if (strlen($author) !== 0) {
                $sql .= "WHERE products.authorId= '" . $author . "' ";
            }


            $stmt = $conn->prepare($sql);
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
        $product =  $this->getById($productId, "product_id", "products") ?? [];

        return $product[0] ?? null;
    }
    public function addOneProductToOrder($userId, Order $order, OrderDetail $orderDetail)
    {
        $table = "orders";
        $columns = "order_id, status, customer_id, totail_product, status_payment, status_stransport, totail_price";
        $values = [
            $order->getOrder_id(),
            $order->getStatus(),
            $order->getCustomer_id(),
            $order->getTotal_product(),
            $order->getStatus_payment(),
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
}
